
/* eslint-disable */
;(function(window) {
	'use strict';
	var document = window.document;
	function textSearcher(query_selector, input_field, search_count_output, result_class) {
		this._init(query_selector, input_field, search_count_output, result_class);
		return {
			_init: this._init.bind(this),
			_search: this._search.bind(this),
			_destroy: this._destroy.bind(this),
		}
	}
	textSearcher.prototype = {
		_init: function(query_selector, input_field, search_count_output, result_class) {
			var document_nodes = document.querySelectorAll(query_selector);
			this.searchable_nodes = [];
			this.search_instances = [];
			for (var node_index = 0; node_index < document_nodes.length; node_index++) {
				var node = document_nodes[node_index];
				if (node.offsetParent !== null && node.offsetHeight > 0 && node.childNodes.length && node.innerText.length) {
					this.searchable_nodes.push(node);
				}
			}
			this.searchable_nodes_length = this.searchable_nodes.length;
			if (input_field && (input_field = document.querySelectorAll(input_field)[0])) {
				this.input_field = input_field;
				this.input_field.addEventListener("keyup", this.searchInputValue.bind(this));
			}
			if (search_count_output && (search_count_output = document.querySelectorAll(search_count_output)[0])) {
				this.search_count_output = search_count_output;
			}
			this.result_class = result_class || "js-textSearcher-highlight";
			return null;
		},
		_search: function(search_value) {
			if (typeof search_value == "undefined") {
				if (this.input_field) {
					search_value = this.input_field.value;
				} else {
					console.error("You can only call this method without a value if an input field is bound");
					return false;
				}
			}
			var search_value_length = search_value.length,
					search_regex = new RegExp(search_value.replace(/[\-\[\]\/\{\}\(\)\*\+\?\.\\\^\$\|]/g, "\\$&"), "gi"),
					node_index = 0;
			this.search_count = 0;
			var instance_index = 0;
			while (instance_index < this.search_instances.length) {
				this.search_instances[instance_index].revert();
				instance_index++;
			}
			this.search_instances = [];
			if (search_value_length) {
				while (node_index < this.searchable_nodes_length) {
					var node = this.searchable_nodes[node_index];
					var instance = findAndReplaceDOMText(node, {
						find: search_regex,
						replace: function(portion, match) {
							var el = document.createElement('span');
							el.className = this.result_class;
							el.innerHTML = portion.text;
							return el;
						}.bind(this)
					});
					this.search_count += instance.reverts.length;
					this.search_instances.push(instance);
					node_index++;
				}
			}
			if (this.search_count_output) {
				this.search_count_output.textContent = this.search_count;
			}
		},
		_destroy: function() {
			if (this.input_field) {
				this.input_field.removeEventListener("keyup", this.searchInputValue);
			}
		},
		searchInputValue(event) {
			this._search(event.target.value);
		}
	}
	window.textSearcher = textSearcher;
}) (window);

export const Search = {
  onLoad: function() {
    this.onToggle();
    this.onClose();
    this.onListenSearchInput();
  },
  onToggle: function() {
    $('.btn-toggle-search').on('click', function() {
      const searchSection = $('#search-section');
      // show search
      if (searchSection.hasClass('d-none')) {
        searchSection.removeClass('d-none');
        $('main.main').addClass('d-none')
        Search.addClassAngleDown();
        $('#search').focus();
      } else {
        // hide search
        Search.close();
      }
    });
  },
  onClose: function() {
    $('.btn-close-search').on('click', function() {
      $('#search').val('');
      Search.close();
    });
  },
  close: function() {
    $('#search-section').addClass('d-none');
    $('main.main').removeClass('d-none');
    Search.addClassSearch();
  },
  addClassAngleDown: function() {
    $('.btn-toggle-search').find('.fa').removeClass('fa-search').addClass('fa-angle-down');
  },
  addClassSearch: function() {
    $('.btn-toggle-search').find('.fa').addClass('fa-search').removeClass('fa-angle-down');
  },
  onListenSearchInput: function() {
    $('#search').on('input', function() {
      const search_val = $(this).val().toLowerCase();
      if (search_val.length) {
        $('#quick-search-listing li').each(function() {
          const item_text = $(this).text().toLowerCase();
          $(this).toggleClass('d-none', item_text.indexOf(search_val) === -1);
        });
      } else {
        $('#quick-search-listing li').addClass('d-none');
      }
    });
  },
};
