<style>
        /* cross browser line-clamp css */
        .line-clamp
        {
            display            : block;
            display            : -webkit-box;
            -webkit-box-orient : vertical;
            position           : relative;
            line-height        : 1.4;
            overflow           : hidden;
            text-overflow      : ellipsis;
            padding            : 0 !important;
        }
        .line-clamp:after
        {
            content    : '...';
            text-align : right;
            bottom     : 0;
            right      : 0;
            width      : 25%;
            display    : block;
            position   : absolute;
            height     : calc(1em * 1.4);
            /* background : linear-gradient(to right, rgba(255, 255, 255, 0), rgba(255, 255, 255, 1) 75%); */
        }
        @supports (-webkit-line-clamp: 1)
        {
            .line-clamp:after
            {
                display : none !important;
            }
        }
        .line-clamp-1
        {
            -webkit-line-clamp : 1;
            height             : calc(1em * 1.4 * 1);
        }
        .line-clamp-2
        {
            -webkit-line-clamp : 2;
            height             : calc(1em * 1.4 * 2);
        }
        .line-clamp-3
        {
            -webkit-line-clamp : 3;
            height             : calc(1em * 1.4 * 3);
        }
        .line-clamp-4
        {
            -webkit-line-clamp : 4;
            height             : calc(1em * 1.4 * 4);
        }
        .line-clamp-5
        {
            -webkit-line-clamp : 5;
            height             : calc(1em * 1.4 * 5);
        }
        /* End required CSS. */

  </style>

<section class="container mb-2" >
        <div class="row js-simple-collapse js-simple-collapse--description">
            <div class=" col-sm-12 col-md-6 col-lg-8  rounded text-black js-simple-collapse-inner">
            
                    <div class=" p-3 bg-white vticker">
                        <h6 class=" pb-2 mb-0">I’m a witness  <span class="small font-italic"> (Impact of Pastor’s messages)</span></h6>
                          <hr>
                            <div class="media  pt-1 li ">
                               <img src="http://cloud.blwcplfonline.org/V2/profile_pics/cpm34431539114890.jpg" width="40px" height="40px;" alt="" class="rounded-circle  mr-2 " >
                                <p class="media-body pb-3 mb-0 small text-black lh-125  border-primary ">
                                    <strong class="d-block text-gray-dark">@username</strong>
                                    <span class="line-clamp line-clamp-2">
                                    Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus.
                                    Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus.
                                    </span>
                                </p>
                        
                            </div>

                            <hr class="my-0">

                            <div class="media pt-2 li">
                                        <img src="http://cloud.blwcplfonline.org/V2/profile_pics/cpm34431539114890.jpg" width="40px" height="40px;" alt="" class="rounded-circle  mr-2 " >
                                        <p class="media-body pb-3 mb-0 small text-black lh-125  border-gray s">
                                            <strong class="d-block text-gray-dark">@username</strong>
                                            <span class="line-clamp line-clamp-2">
                                            Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus.
                                            Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh
                                          </span>
                                        </p>
                            </div>

                            <hr class="my-0">

                            <div class="media  pt-2 li">
                                        <img src="http://cloud.blwcplfonline.org/V2/profile_pics/cpm34431539114890.jpg" width="40px" height="40px;" alt="" class="rounded-circle  mr-2  " >
                                        <p class="media-body pb-3 mb-0 small text-black lh-125  border-gray">
                                            <strong class="d-block text-gray-dark">@username</strong>
                                            <span class="line-clamp line-clamp-2">
                                            Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus.
                                            Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fer
                                           </span>
                                        </p>
                            </div>

                            


                             <hr class="mt-0">


                            <small class="d-block text-right mb-1">
                              <a href="#">More ></a>
                            </small>
            </div>
        </div>
                
                
            <div class="col-sm-12 col-md-6 col-lg-4 ">
                <div class="pgradient rounded   p-3  text-white">
                        <h6 class="p-3">Book/Message of the Week</h6>
                          <img alt="" src="images/book.jpg"  class="border-warning border">
                        <p class="p-2">Your Rights In Christ</p>
                </div>

            </div>
        
        
</section>



