// import external dependencies
import 'jquery';

// Import everything from autoload
import './autoload/**/*'

import { Age } from './layouts/Age';
import { CookiePolicy } from './layouts/CookiePolicy';
import { Search } from './layouts/Search';
import { Announcement } from './layouts/Announcement';
import { RightSidebar } from './layouts/RightSidebar';
import { Login } from './layouts/Login';
import { Hero } from './layouts/Hero';
import { Splash } from './modules/Splash';
import { Home } from './modules/Home';
import { ArchiveProduct } from './modules/ArchiveProduct';
import { Product } from './modules/Product';

// Load Events
jQuery(document).ready(() => {
  // layouts
  Age.onLoad();
  CookiePolicy.onLoad();
  Search.onLoad();
  Announcement.onLoad();
  RightSidebar.onLoad();
  Login.onLoad();
  Hero.onLoad();
  // modules
  Splash.onLoad();
  Home.onLoad();
  ArchiveProduct.onLoad();
  Product.onLoad();
});
