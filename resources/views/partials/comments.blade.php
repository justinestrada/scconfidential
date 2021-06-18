@if ( post_password_required() )
	@php return; @endphp
@endif
<div id="comments" class="comments-area">
	{{-- // You can start editing here -- including this comment! --}}
	@if ( have_comments() )
		<h2 class="comments-title">
			@php
			$radical_skincare_comment_count = get_comments_number();
            @endphp
			@if ( '1' === $radical_skincare_comment_count )
                @php
				printf(
					/* translators: 1: title. */
					esc_html__( 'One thought on &ldquo;%1$s&rdquo;', 'radical-skin-care' ),
					'<span>' . get_the_title() . '</span>'
				);
                @endphp
			@else
                @php
				printf( // WPCS: XSS OK.
					/* translators: 1: comment count number, 2: title. */
					esc_html( _nx( '%1$s thought on &ldquo;%2$s&rdquo;', '%1$s thoughts on &ldquo;%2$s&rdquo;', $radical_skincare_comment_count, 'comments title', 'radical-skin-care' ) ),
					number_format_i18n( $radical_skincare_comment_count ),
					'<span>' . get_the_title() . '</span>'
				);
                @endphp
			@endif
		</h2>
        @php the_comments_navigation(); @endphp
		<ol class="comment-list">
			@php
			wp_list_comments( array(
				'style'      => 'ol',
				'short_ping' => true,
			) );
			@endphp
		</ol>
		@php
		the_comments_navigation();
        @endphp
		{{-- // If comments are closed and there are comments, let's leave a little note, shall we? --}}
		@if ( ! comments_open() )
			<p class="no-comments">@php esc_html_e( 'Comments are closed.', 'radical-skin-care' ); @endphp</p>
		@endif
	@endif
	@php
    comment_form();
	@endphp
</div>
