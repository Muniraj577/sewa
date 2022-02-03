<div class="nav_bar header-sticky">
    <div class="container pl-0 ">
       <div class="row">
          <div class="col-md-2">
             <a class="navbar-brand text-dark font-weight-bold" href="index.html"><img src="./frontend/assets/images/logo.jpg"
                   alt="" class="img-fluid"></a>
          </div>
          <!-- search start  -->

          <div class="searchbar d-none d-md-block">
             <input class="search_input" type="text" name="" placeholder="Search..." />
             <a href="product-listing.html" class="search_icon"><i class="fas fa-search"></i></a>
          </div>


          <!-- search mobile new star  -->
          <div class="search_mobile_men  d-block d-md-none">
             <button class="search_icon_new" type="submit">
                <i class="fa fa-search"></i>
             </button>

             <div class="sub_search">
                <form action="" class="d-flex">
                   <input class="input_box" type="text" placeholder="Search.." name="search" />
                   <button class="search_top" type="submit">
                      <i class="fa fa-search" aria-hidden="true"></i>
                   </button>
                </form>
             </div>
          </div>
          <!-- search mobile new end  -->

          <div class="col-md-8">
             <div class="search_men d-none d-md-block">
                <form class="form-inline search_top">
                   <input class="form-control border-0 search_input" type="search" placeholder="Search for Products"
                      aria-label="Search" />
                   <div class="search_select border-0">
                      <select name="" id="" class="border-0 search_select_content px-2">
                         <option value="0" selected="selected">
                            All Categories
                         </option>
                         <option class="level-0" value="accessories">
                            Accessories
                         </option>
                         <option class="level-0" value="cameras-photography">
                            Cameras &amp; Photography
                         </option>
                         <option class="level-0" value="computer-components">
                            Computer Components
                         </option>
                         <option class="level-0" value="gadgets">Gadgets</option>
                         <option class="level-0" value="home-entertainment">
                            Home Entertainment
                         </option>
                         <option class="level-0" value="laptops-computers">
                            Laptops &amp; Computers
                         </option>
                         <option class="level-0" value="headphones-2">
                            Headphones
                         </option>
                         <option class="level-0" value="speakers-2">Speakers</option>
                      </select>
                   </div>
                   <div class="search_icon_top text-center">
                      <a href="product-listing.html" class="search_icon text-dark"><i class="fa fa-search"></i></a>
                   </div>
                </form>
             </div>
          </div>
          <div class="col-md-2">
             <ul class="cart_top_list d-flex justify-content-around mb-0 h-100 align-items-center ">

                <li>
                   <a href="compare.html" class="position-relative">
                      <sub class='sub_block'>1</sub>
                      <img data-toggle="tooltip" data-placement="top" title="" data-original-title="Compare"
                         src="./frontend/assets/images/logo/compare.svg" class="img-fluid" alt="" /></a>
                </li>
                <li>
                   <a href="wishlist.html" class="position-relative">
                      <sub class='sub_block'>0</sub><img data-toggle="tooltip" data-placement="top" title=""
                         data-original-title="Wishlist" src="./frontend/assets/images/logo/wishlist.svg"
                         class="img-fluid" alt="" /></a>
                </li>
                <li>
                   <a href="" class="position-relative" id="dropdownMenuButton" data-toggle="dropdown"
                      aria-haspopup="true" aria-expanded="false">
                      <sub class='sub_block'>1</sub><img data-toggle="tooltip" data-placement="top" title=""
                         data-original-title="Cart" src="./frontend/assets/images/logo/cart.svg" class="img-fluid"
                         alt="" /></a>
                   <!-- cart dropdown start  -->
                   <div class="dropdown-menu" id="cart_header_table" aria-labelledby="dropdownMenuButton">
                      <h6 class="text-center font-weight-bold pt-1">Cart Items</h6>
                      <div class="table-responsive">
                         <table class="table mb-0">

                            <tbody>
                               <tr>

                                  <td class="img_header_cart">
                                     <div>
                                        <a href=""><img
                                              src="http://127.0.0.1:8000/uploads/products/thumbnail/awQYj0DwQtoWwENvsPuEeWNoHTzOqOZIihRxRj2u.jpeg"
                                              alt=""></a>
                                     </div>
                                  </td>
                                  <td class="cart_header_title"> <a href="" class="text-dark">Electric Keema Machine
                                        Keema Maker</a> </td>
                                  <td> <a href="" class="header_cart_icon">
                                        <ii class="fa fa-trash-o" aria-hidden="true"></i>
                                     </a> </td>
                               </tr>
                               <tr>

                                  <td class="img_header_cart">
                                     <div>
                                        <a href=""><img
                                              src="http://127.0.0.1:8000/uploads/products/thumbnail/awQYj0DwQtoWwENvsPuEeWNoHTzOqOZIihRxRj2u.jpeg"
                                              alt=""></a>
                                     </div>
                                  </td>
                                  <td class="cart_header_title"> <a href="" class="text-dark">Electric Keema </a>
                                  </td>
                                  <td> <a href="" class="header_cart_icon">
                                        <ii class="fa fa-trash-o" aria-hidden="true"></i>
                                     </a> </td>
                               </tr>
                               <tr>

                                  <td class="img_header_cart">
                                     <div>
                                        <a href=""><img
                                              src="http://127.0.0.1:8000/uploads/products/thumbnail/awQYj0DwQtoWwENvsPuEeWNoHTzOqOZIihRxRj2u.jpeg"
                                              alt=""></a>
                                     </div>
                                  </td>
                                  <td class="cart_header_title"> <a href="" class="text-dark">Electric Keema Machine
                                        Keema Maker</a> </td>
                                  <td> <a href="" class="header_cart_icon">
                                        <ii class="fa fa-trash-o" aria-hidden="true"></i>
                                     </a> </td>
                               </tr>

                            </tbody>
                         </table>
                      </div>

                      <div class="cart_header_price d-flex justify-content-between">
                         <div>
                            <h6>Subtotal</h6>
                         </div>
                         <div>
                            <h6>Rs4,300.00</h6>
                         </div>
                      </div>

                      <div class="
                             top_cartmodal_btn
                             d-flex
                             justify-content-around
                             align-items-center
                             w-100 pt-2 
                           ">
                         <a href="cart.html" class="btn-custom rounded-0 py-2">
                            <img src="./frontend/assets/images/logo/cart.svg" class="img-fluid" alt="">&nbsp; View
                            Cart</a>
                         <a href="checkout.html" class="btn-custom rounded-0 py-2"> <img
                               src="./frontend/assets/images/logo/cart.svg" class="img-fluid" alt="">&nbsp; Proceed
                            Checkout</a>
                      </div>


                   </div>

                   <!-- cart dropdown end  -->
                </li>
             </ul>
          </div>
       </div>
    </div>
    <!-- Button trigger modal -->
    <div class="mobile-menu d-lg-none d-md-block mr-4 position-absolute" data-toggle="modal"
       data-target="#rightsidebarfilter">
       <span><i class="fa fa-bars fa-2x text-light" aria-hidden="true"></i></span>
    </div>
    <!-- Button trigger modal -->
 </div>