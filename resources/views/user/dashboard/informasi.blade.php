@extends('user.layout.main')
@section('content')
    <!-- main content -->
    <main class="main">
        <div class="container">
            <div class="row">
                <!-- breadcrumb -->
                <div class="col-12">
                    <ul class="breadcrumbs">
                        <li class="breadcrumbs__item"><a href="index.html">Home</a></li>
                        <li class="breadcrumbs__item breadcrumbs__item--active">Informasi</li>
                    </ul>
                </div>
                <!-- end breadcrumb -->

                <!-- title -->
                <div class="col-12">
                    <div class="main__title main__title--page">
                        <h1>Informasi</h1>
                    </div>
                </div>
                <!-- end title -->

                <!-- tabs nav -->
                <div class="col-12">
                    <ul class="nav nav-tabs main__tabs main__tabs--page" id="main__tabs" role="tablist">
                        <li class="nav-item" role="presentation">
                            <button class="active" data-bs-toggle="tab" data-bs-target="#tab-1" type="button"
                                role="tab" aria-controls="tab-1" aria-selected="true">All news</button>
                        </li>

                        <li class="nav-item" role="presentation">
                            <button data-bs-toggle="tab" data-bs-target="#tab-2" type="button" role="tab"
                                aria-controls="tab-2" aria-selected="false">Cars</button>
                        </li>

                        <li class="nav-item" role="presentation">
                            <button data-bs-toggle="tab" data-bs-target="#tab-3" type="button" role="tab"
                                aria-controls="tab-3" aria-selected="false">Company</button>
                        </li>

                        <li class="nav-item" role="presentation">
                            <button data-bs-toggle="tab" data-bs-target="#tab-4" type="button" role="tab"
                                aria-controls="tab-4" aria-selected="false">Useful</button>
                        </li>
                    </ul>
                </div>
                <!-- end tabs nav -->
            </div>

            <div class="tab-content">
                <div class="tab-pane fade show active" id="tab-1" role="tabpanel">
                    <div class="row">
                        <!-- post -->
                        <div class="col-12 col-md-6 col-xl-4">
                            <div class="post">
                                <a href="article.html" class="post__img">
                                    <img src="img/posts/8.jpg" alt="">
                                </a>

                                <div class="post__content">
                                    <a href="#" class="post__category"><span>Cars</span></a>
                                    <h3 class="post__title"><a href="article.html">What´s required when <br>renting a
                                            car?</a></h3>
                                    <div class="post__meta">
                                        <span class="post__date"><svg xmlns="http://www.w3.org/2000/svg"
                                                viewBox="0 0 24 24">
                                                <path
                                                    d="M15,11H13V7a1,1,0,0,0-2,0v5a1,1,0,0,0,1,1h3a1,1,0,0,0,0-2ZM12,2A10,10,0,1,0,22,12,10.01114,10.01114,0,0,0,12,2Zm0,18a8,8,0,1,1,8-8A8.00917,8.00917,0,0,1,12,20Z" />
                                            </svg> January 14, 2022</span>
                                        <span class="post__comments"><svg xmlns="http://www.w3.org/2000/svg"
                                                viewBox="0 0 24 24">
                                                <path
                                                    d="M12,2A10,10,0,0,0,2,12a9.89,9.89,0,0,0,2.26,6.33l-2,2a1,1,0,0,0-.21,1.09A1,1,0,0,0,3,22h9A10,10,0,0,0,12,2Zm0,18H5.41l.93-.93a1,1,0,0,0,0-1.41A8,8,0,1,1,12,20Zm5-9H7a1,1,0,0,0,0,2H17a1,1,0,0,0,0-2Zm-2,4H9a1,1,0,0,0,0,2h6a1,1,0,0,0,0-2ZM9,9h6a1,1,0,0,0,0-2H9A1,1,0,0,0,9,9Z" />
                                            </svg> 32</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- end post -->
                    </div>

                    <!-- collapse -->
                    <div class="row collapse" id="collapsemore">
                        <!-- post -->
                        <div class="col-12 col-md-6 col-xl-4">
                            <div class="post">
                                <a href="article.html" class="post__img">
                                    <img src="img/posts/2.jpg" alt="">
                                </a>

                                <div class="post__content">
                                    <a href="#" class="post__category"><span>Company</span></a>
                                    <h3 class="post__title"><a href="article.html">Business development strategy for
                                            the coming year</a></h3>
                                    <div class="post__meta">
                                        <span class="post__date"><svg xmlns="http://www.w3.org/2000/svg"
                                                viewBox="0 0 24 24">
                                                <path
                                                    d="M15,11H13V7a1,1,0,0,0-2,0v5a1,1,0,0,0,1,1h3a1,1,0,0,0,0-2ZM12,2A10,10,0,1,0,22,12,10.01114,10.01114,0,0,0,12,2Zm0,18a8,8,0,1,1,8-8A8.00917,8.00917,0,0,1,12,20Z" />
                                            </svg> January 14, 2022</span>
                                        <span class="post__comments"><svg xmlns="http://www.w3.org/2000/svg"
                                                viewBox="0 0 24 24">
                                                <path
                                                    d="M12,2A10,10,0,0,0,2,12a9.89,9.89,0,0,0,2.26,6.33l-2,2a1,1,0,0,0-.21,1.09A1,1,0,0,0,3,22h9A10,10,0,0,0,12,2Zm0,18H5.41l.93-.93a1,1,0,0,0,0-1.41A8,8,0,1,1,12,20Zm5-9H7a1,1,0,0,0,0,2H17a1,1,0,0,0,0-2Zm-2,4H9a1,1,0,0,0,0,2h6a1,1,0,0,0,0-2ZM9,9h6a1,1,0,0,0,0-2H9A1,1,0,0,0,9,9Z" />
                                            </svg> 32</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- end post -->

                        <!-- post -->
                        <div class="col-12 col-md-6 col-xl-4">
                            <div class="post">
                                <a href="article.html" class="post__img">
                                    <img src="img/posts/9.jpg" alt="">
                                </a>

                                <div class="post__content">
                                    <a href="#" class="post__category"><span>Repair</span></a>
                                    <h3 class="post__title"><a href="article.html">Where to find spare parts <br>for
                                            old cars?</a></h3>
                                    <div class="post__meta">
                                        <span class="post__date"><svg xmlns="http://www.w3.org/2000/svg"
                                                viewBox="0 0 24 24">
                                                <path
                                                    d="M15,11H13V7a1,1,0,0,0-2,0v5a1,1,0,0,0,1,1h3a1,1,0,0,0,0-2ZM12,2A10,10,0,1,0,22,12,10.01114,10.01114,0,0,0,12,2Zm0,18a8,8,0,1,1,8-8A8.00917,8.00917,0,0,1,12,20Z" />
                                            </svg> January 12, 2022</span>
                                        <span class="post__comments"><svg xmlns="http://www.w3.org/2000/svg"
                                                viewBox="0 0 24 24">
                                                <path
                                                    d="M12,2A10,10,0,0,0,2,12a9.89,9.89,0,0,0,2.26,6.33l-2,2a1,1,0,0,0-.21,1.09A1,1,0,0,0,3,22h9A10,10,0,0,0,12,2Zm0,18H5.41l.93-.93a1,1,0,0,0,0-1.41A8,8,0,1,1,12,20Zm5-9H7a1,1,0,0,0,0,2H17a1,1,0,0,0,0-2Zm-2,4H9a1,1,0,0,0,0,2h6a1,1,0,0,0,0-2ZM9,9h6a1,1,0,0,0,0-2H9A1,1,0,0,0,9,9Z" />
                                            </svg> 44</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- end post -->

                        <!-- post -->
                        <div class="col-12 col-md-6 col-xl-4">
                            <div class="post">
                                <a href="article.html" class="post__img">
                                    <img src="img/posts/10.jpg" alt="">
                                </a>

                                <div class="post__content">
                                    <a href="#" class="post__category"><span>Repair</span></a>
                                    <h3 class="post__title"><a href="article.html">We present our new partner, network
                                            for the sale of auto parts</a></h3>
                                    <div class="post__meta">
                                        <span class="post__date"><svg xmlns="http://www.w3.org/2000/svg"
                                                viewBox="0 0 24 24">
                                                <path
                                                    d="M15,11H13V7a1,1,0,0,0-2,0v5a1,1,0,0,0,1,1h3a1,1,0,0,0,0-2ZM12,2A10,10,0,1,0,22,12,10.01114,10.01114,0,0,0,12,2Zm0,18a8,8,0,1,1,8-8A8.00917,8.00917,0,0,1,12,20Z" />
                                            </svg> January 11, 2022</span>
                                        <span class="post__comments"><svg xmlns="http://www.w3.org/2000/svg"
                                                viewBox="0 0 24 24">
                                                <path
                                                    d="M12,2A10,10,0,0,0,2,12a9.89,9.89,0,0,0,2.26,6.33l-2,2a1,1,0,0,0-.21,1.09A1,1,0,0,0,3,22h9A10,10,0,0,0,12,2Zm0,18H5.41l.93-.93a1,1,0,0,0,0-1.41A8,8,0,1,1,12,20Zm5-9H7a1,1,0,0,0,0,2H17a1,1,0,0,0,0-2Zm-2,4H9a1,1,0,0,0,0,2h6a1,1,0,0,0,0-2ZM9,9h6a1,1,0,0,0,0-2H9A1,1,0,0,0,9,9Z" />
                                            </svg> 118</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- end post -->

                        <!-- post -->
                        <div class="col-12 col-md-6 col-xl-4">
                            <div class="post">
                                <a href="article.html" class="post__img">
                                    <img src="img/posts/11.jpg" alt="">
                                </a>

                                <div class="post__content">
                                    <a href="#" class="post__category"><span>Useful</span></a>
                                    <h3 class="post__title"><a href="article.html">Free parking in the whole
                                            country</a></h3>
                                    <div class="post__meta">
                                        <span class="post__date"><svg xmlns="http://www.w3.org/2000/svg"
                                                viewBox="0 0 24 24">
                                                <path
                                                    d="M15,11H13V7a1,1,0,0,0-2,0v5a1,1,0,0,0,1,1h3a1,1,0,0,0,0-2ZM12,2A10,10,0,1,0,22,12,10.01114,10.01114,0,0,0,12,2Zm0,18a8,8,0,1,1,8-8A8.00917,8.00917,0,0,1,12,20Z" />
                                            </svg> January 9, 2022</span>
                                        <span class="post__comments"><svg xmlns="http://www.w3.org/2000/svg"
                                                viewBox="0 0 24 24">
                                                <path
                                                    d="M12,2A10,10,0,0,0,2,12a9.89,9.89,0,0,0,2.26,6.33l-2,2a1,1,0,0,0-.21,1.09A1,1,0,0,0,3,22h9A10,10,0,0,0,12,2Zm0,18H5.41l.93-.93a1,1,0,0,0,0-1.41A8,8,0,1,1,12,20Zm5-9H7a1,1,0,0,0,0,2H17a1,1,0,0,0,0-2Zm-2,4H9a1,1,0,0,0,0,2h6a1,1,0,0,0,0-2ZM9,9h6a1,1,0,0,0,0-2H9A1,1,0,0,0,9,9Z" />
                                            </svg> 0</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- end post -->

                        <!-- post -->
                        <div class="col-12 col-md-6 col-xl-4">
                            <div class="post">
                                <a href="article.html" class="post__img">
                                    <img src="img/posts/12.jpg" alt="">
                                </a>

                                <div class="post__content">
                                    <a href="#" class="post__category"><span>Cars</span></a>
                                    <h3 class="post__title"><a href="article.html">Electric steering reserve:
                                            <br>waiting vs reality</a></h3>
                                    <div class="post__meta">
                                        <span class="post__date"><svg xmlns="http://www.w3.org/2000/svg"
                                                viewBox="0 0 24 24">
                                                <path
                                                    d="M15,11H13V7a1,1,0,0,0-2,0v5a1,1,0,0,0,1,1h3a1,1,0,0,0,0-2ZM12,2A10,10,0,1,0,22,12,10.01114,10.01114,0,0,0,12,2Zm0,18a8,8,0,1,1,8-8A8.00917,8.00917,0,0,1,12,20Z" />
                                            </svg> January 5, 2022</span>
                                        <span class="post__comments"><svg xmlns="http://www.w3.org/2000/svg"
                                                viewBox="0 0 24 24">
                                                <path
                                                    d="M12,2A10,10,0,0,0,2,12a9.89,9.89,0,0,0,2.26,6.33l-2,2a1,1,0,0,0-.21,1.09A1,1,0,0,0,3,22h9A10,10,0,0,0,12,2Zm0,18H5.41l.93-.93a1,1,0,0,0,0-1.41A8,8,0,1,1,12,20Zm5-9H7a1,1,0,0,0,0,2H17a1,1,0,0,0,0-2Zm-2,4H9a1,1,0,0,0,0,2h6a1,1,0,0,0,0-2ZM9,9h6a1,1,0,0,0,0-2H9A1,1,0,0,0,9,9Z" />
                                            </svg> 97</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- end post -->

                        <!-- post -->
                        <div class="col-12 col-md-6 col-xl-4">
                            <div class="post">
                                <a href="article.html" class="post__img">
                                    <img src="img/posts/7.jpg" alt="">
                                </a>

                                <div class="post__content">
                                    <a href="#" class="post__category"><span>Useful</span></a>
                                    <h3 class="post__title"><a href="article.html">What is car rental with redemption
                                            right?</a></h3>
                                    <div class="post__meta">
                                        <span class="post__date"><svg xmlns="http://www.w3.org/2000/svg"
                                                viewBox="0 0 24 24">
                                                <path
                                                    d="M15,11H13V7a1,1,0,0,0-2,0v5a1,1,0,0,0,1,1h3a1,1,0,0,0,0-2ZM12,2A10,10,0,1,0,22,12,10.01114,10.01114,0,0,0,12,2Zm0,18a8,8,0,1,1,8-8A8.00917,8.00917,0,0,1,12,20Z" />
                                            </svg> January 4, 2022</span>
                                        <span class="post__comments"><svg xmlns="http://www.w3.org/2000/svg"
                                                viewBox="0 0 24 24">
                                                <path
                                                    d="M12,2A10,10,0,0,0,2,12a9.89,9.89,0,0,0,2.26,6.33l-2,2a1,1,0,0,0-.21,1.09A1,1,0,0,0,3,22h9A10,10,0,0,0,12,2Zm0,18H5.41l.93-.93a1,1,0,0,0,0-1.41A8,8,0,1,1,12,20Zm5-9H7a1,1,0,0,0,0,2H17a1,1,0,0,0,0-2Zm-2,4H9a1,1,0,0,0,0,2h6a1,1,0,0,0,0-2ZM9,9h6a1,1,0,0,0,0-2H9A1,1,0,0,0,9,9Z" />
                                            </svg> 226</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- end post -->
                    </div>

                    <div class="row">
                        <div class="col-12">
                            <button class="main__load" type="button" data-bs-toggle="collapse"
                                data-bs-target="#collapsemore" aria-expanded="false"
                                aria-controls="collapsemore"><span>Load more</span></button>
                        </div>
                    </div>
                    <!-- end collapse -->
                </div>

                <div class="tab-pane fade" id="tab-2" role="tabpanel">
                    <div class="row">
                        <!-- post -->
                        <div class="col-12 col-md-6 col-xl-4">
                            <div class="post">
                                <a href="article.html" class="post__img">
                                    <img src="img/posts/8.jpg" alt="">
                                </a>

                                <div class="post__content">
                                    <h3 class="post__title"><a href="article.html">What´s required when <br>renting a
                                            car?</a></h3>
                                    <div class="post__meta">
                                        <span class="post__date"><svg xmlns="http://www.w3.org/2000/svg"
                                                viewBox="0 0 24 24">
                                                <path
                                                    d="M15,11H13V7a1,1,0,0,0-2,0v5a1,1,0,0,0,1,1h3a1,1,0,0,0,0-2ZM12,2A10,10,0,1,0,22,12,10.01114,10.01114,0,0,0,12,2Zm0,18a8,8,0,1,1,8-8A8.00917,8.00917,0,0,1,12,20Z" />
                                            </svg> January 14, 2022</span>
                                        <span class="post__comments"><svg xmlns="http://www.w3.org/2000/svg"
                                                viewBox="0 0 24 24">
                                                <path
                                                    d="M12,2A10,10,0,0,0,2,12a9.89,9.89,0,0,0,2.26,6.33l-2,2a1,1,0,0,0-.21,1.09A1,1,0,0,0,3,22h9A10,10,0,0,0,12,2Zm0,18H5.41l.93-.93a1,1,0,0,0,0-1.41A8,8,0,1,1,12,20Zm5-9H7a1,1,0,0,0,0,2H17a1,1,0,0,0,0-2Zm-2,4H9a1,1,0,0,0,0,2h6a1,1,0,0,0,0-2ZM9,9h6a1,1,0,0,0,0-2H9A1,1,0,0,0,9,9Z" />
                                            </svg> 32</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- end post -->

                        <!-- post -->
                        <div class="col-12 col-md-6 col-xl-4">
                            <div class="post">
                                <a href="article.html" class="post__img">
                                    <img src="img/posts/3.jpg" alt="">
                                </a>

                                <div class="post__content">
                                    <h3 class="post__title"><a href="article.html">Statistics showed which average age
                                            of cars</a></h3>
                                    <div class="post__meta">
                                        <span class="post__date"><svg xmlns="http://www.w3.org/2000/svg"
                                                viewBox="0 0 24 24">
                                                <path
                                                    d="M15,11H13V7a1,1,0,0,0-2,0v5a1,1,0,0,0,1,1h3a1,1,0,0,0,0-2ZM12,2A10,10,0,1,0,22,12,10.01114,10.01114,0,0,0,12,2Zm0,18a8,8,0,1,1,8-8A8.00917,8.00917,0,0,1,12,20Z" />
                                            </svg> January 12, 2022</span>
                                        <span class="post__comments"><svg xmlns="http://www.w3.org/2000/svg"
                                                viewBox="0 0 24 24">
                                                <path
                                                    d="M12,2A10,10,0,0,0,2,12a9.89,9.89,0,0,0,2.26,6.33l-2,2a1,1,0,0,0-.21,1.09A1,1,0,0,0,3,22h9A10,10,0,0,0,12,2Zm0,18H5.41l.93-.93a1,1,0,0,0,0-1.41A8,8,0,1,1,12,20Zm5-9H7a1,1,0,0,0,0,2H17a1,1,0,0,0,0-2Zm-2,4H9a1,1,0,0,0,0,2h6a1,1,0,0,0,0-2ZM9,9h6a1,1,0,0,0,0-2H9A1,1,0,0,0,9,9Z" />
                                            </svg> 44</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- end post -->

                        <!-- post -->
                        <div class="col-12 col-md-6 col-xl-4">
                            <div class="post">
                                <a href="article.html" class="post__img">
                                    <img src="img/posts/12.jpg" alt="">
                                </a>

                                <div class="post__content">
                                    <h3 class="post__title"><a href="article.html">Electric steering reserve:
                                            <br>waiting vs reality</a></h3>
                                    <div class="post__meta">
                                        <span class="post__date"><svg xmlns="http://www.w3.org/2000/svg"
                                                viewBox="0 0 24 24">
                                                <path
                                                    d="M15,11H13V7a1,1,0,0,0-2,0v5a1,1,0,0,0,1,1h3a1,1,0,0,0,0-2ZM12,2A10,10,0,1,0,22,12,10.01114,10.01114,0,0,0,12,2Zm0,18a8,8,0,1,1,8-8A8.00917,8.00917,0,0,1,12,20Z" />
                                            </svg> January 5, 2022</span>
                                        <span class="post__comments"><svg xmlns="http://www.w3.org/2000/svg"
                                                viewBox="0 0 24 24">
                                                <path
                                                    d="M12,2A10,10,0,0,0,2,12a9.89,9.89,0,0,0,2.26,6.33l-2,2a1,1,0,0,0-.21,1.09A1,1,0,0,0,3,22h9A10,10,0,0,0,12,2Zm0,18H5.41l.93-.93a1,1,0,0,0,0-1.41A8,8,0,1,1,12,20Zm5-9H7a1,1,0,0,0,0,2H17a1,1,0,0,0,0-2Zm-2,4H9a1,1,0,0,0,0,2h6a1,1,0,0,0,0-2ZM9,9h6a1,1,0,0,0,0-2H9A1,1,0,0,0,9,9Z" />
                                            </svg> 97</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- end post -->
                    </div>
                </div>

                <div class="tab-pane fade" id="tab-3" role="tabpanel">
                    <div class="row">
                        <!-- post -->
                        <div class="col-12 col-md-6 col-xl-4">
                            <div class="post">
                                <a href="article.html" class="post__img">
                                    <img src="img/posts/1.jpg" alt="">
                                </a>

                                <div class="post__content">
                                    <h3 class="post__title"><a href="article.html">Opening of new offices of the
                                            company throughout the country</a></h3>
                                    <div class="post__meta">
                                        <span class="post__date"><svg xmlns="http://www.w3.org/2000/svg"
                                                viewBox="0 0 24 24">
                                                <path
                                                    d="M15,11H13V7a1,1,0,0,0-2,0v5a1,1,0,0,0,1,1h3a1,1,0,0,0,0-2ZM12,2A10,10,0,1,0,22,12,10.01114,10.01114,0,0,0,12,2Zm0,18a8,8,0,1,1,8-8A8.00917,8.00917,0,0,1,12,20Z" />
                                            </svg> January 11, 2022</span>
                                        <span class="post__comments"><svg xmlns="http://www.w3.org/2000/svg"
                                                viewBox="0 0 24 24">
                                                <path
                                                    d="M12,2A10,10,0,0,0,2,12a9.89,9.89,0,0,0,2.26,6.33l-2,2a1,1,0,0,0-.21,1.09A1,1,0,0,0,3,22h9A10,10,0,0,0,12,2Zm0,18H5.41l.93-.93a1,1,0,0,0,0-1.41A8,8,0,1,1,12,20Zm5-9H7a1,1,0,0,0,0,2H17a1,1,0,0,0,0-2Zm-2,4H9a1,1,0,0,0,0,2h6a1,1,0,0,0,0-2ZM9,9h6a1,1,0,0,0,0-2H9A1,1,0,0,0,9,9Z" />
                                            </svg> 118</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- end post -->

                        <!-- post -->
                        <div class="col-12 col-md-6 col-xl-4">
                            <div class="post">
                                <a href="article.html" class="post__img">
                                    <img src="img/posts/5.jpg" alt="">
                                </a>

                                <div class="post__content">
                                    <h3 class="post__title"><a href="article.html">New rules for handling our cars</a>
                                    </h3>
                                    <div class="post__meta">
                                        <span class="post__date"><svg xmlns="http://www.w3.org/2000/svg"
                                                viewBox="0 0 24 24">
                                                <path
                                                    d="M15,11H13V7a1,1,0,0,0-2,0v5a1,1,0,0,0,1,1h3a1,1,0,0,0,0-2ZM12,2A10,10,0,1,0,22,12,10.01114,10.01114,0,0,0,12,2Zm0,18a8,8,0,1,1,8-8A8.00917,8.00917,0,0,1,12,20Z" />
                                            </svg> January 5, 2022</span>
                                        <span class="post__comments"><svg xmlns="http://www.w3.org/2000/svg"
                                                viewBox="0 0 24 24">
                                                <path
                                                    d="M12,2A10,10,0,0,0,2,12a9.89,9.89,0,0,0,2.26,6.33l-2,2a1,1,0,0,0-.21,1.09A1,1,0,0,0,3,22h9A10,10,0,0,0,12,2Zm0,18H5.41l.93-.93a1,1,0,0,0,0-1.41A8,8,0,1,1,12,20Zm5-9H7a1,1,0,0,0,0,2H17a1,1,0,0,0,0-2Zm-2,4H9a1,1,0,0,0,0,2h6a1,1,0,0,0,0-2ZM9,9h6a1,1,0,0,0,0-2H9A1,1,0,0,0,9,9Z" />
                                            </svg> 97</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- end post -->

                        <!-- post -->
                        <div class="col-12 col-md-6 col-xl-4">
                            <div class="post">
                                <a href="article.html" class="post__img">
                                    <img src="img/posts/2.jpg" alt="">
                                </a>

                                <div class="post__content">
                                    <h3 class="post__title"><a href="article.html">Business development strategy for
                                            the coming year</a></h3>
                                    <div class="post__meta">
                                        <span class="post__date"><svg xmlns="http://www.w3.org/2000/svg"
                                                viewBox="0 0 24 24">
                                                <path
                                                    d="M15,11H13V7a1,1,0,0,0-2,0v5a1,1,0,0,0,1,1h3a1,1,0,0,0,0-2ZM12,2A10,10,0,1,0,22,12,10.01114,10.01114,0,0,0,12,2Zm0,18a8,8,0,1,1,8-8A8.00917,8.00917,0,0,1,12,20Z" />
                                            </svg> January 14, 2022</span>
                                        <span class="post__comments"><svg xmlns="http://www.w3.org/2000/svg"
                                                viewBox="0 0 24 24">
                                                <path
                                                    d="M12,2A10,10,0,0,0,2,12a9.89,9.89,0,0,0,2.26,6.33l-2,2a1,1,0,0,0-.21,1.09A1,1,0,0,0,3,22h9A10,10,0,0,0,12,2Zm0,18H5.41l.93-.93a1,1,0,0,0,0-1.41A8,8,0,1,1,12,20Zm5-9H7a1,1,0,0,0,0,2H17a1,1,0,0,0,0-2Zm-2,4H9a1,1,0,0,0,0,2h6a1,1,0,0,0,0-2ZM9,9h6a1,1,0,0,0,0-2H9A1,1,0,0,0,9,9Z" />
                                            </svg> 32</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- end post -->
                    </div>
                </div>

                <div class="tab-pane fade" id="tab-4" role="tabpanel">
                    <div class="row">
                        <!-- post -->
                        <div class="col-12 col-md-6 col-xl-4">
                            <div class="post">
                                <a href="article.html" class="post__img">
                                    <img src="img/posts/6.jpg" alt="">
                                </a>

                                <div class="post__content">
                                    <h3 class="post__title"><a href="article.html">Why need a deposit when <br>renting
                                            a car</a></h3>
                                    <div class="post__meta">
                                        <span class="post__date"><svg xmlns="http://www.w3.org/2000/svg"
                                                viewBox="0 0 24 24">
                                                <path
                                                    d="M15,11H13V7a1,1,0,0,0-2,0v5a1,1,0,0,0,1,1h3a1,1,0,0,0,0-2ZM12,2A10,10,0,1,0,22,12,10.01114,10.01114,0,0,0,12,2Zm0,18a8,8,0,1,1,8-8A8.00917,8.00917,0,0,1,12,20Z" />
                                            </svg> January 4, 2022</span>
                                        <span class="post__comments"><svg xmlns="http://www.w3.org/2000/svg"
                                                viewBox="0 0 24 24">
                                                <path
                                                    d="M12,2A10,10,0,0,0,2,12a9.89,9.89,0,0,0,2.26,6.33l-2,2a1,1,0,0,0-.21,1.09A1,1,0,0,0,3,22h9A10,10,0,0,0,12,2Zm0,18H5.41l.93-.93a1,1,0,0,0,0-1.41A8,8,0,1,1,12,20Zm5-9H7a1,1,0,0,0,0,2H17a1,1,0,0,0,0-2Zm-2,4H9a1,1,0,0,0,0,2h6a1,1,0,0,0,0-2ZM9,9h6a1,1,0,0,0,0-2H9A1,1,0,0,0,9,9Z" />
                                            </svg> 226</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- end post -->

                        <!-- post -->
                        <div class="col-12 col-md-6 col-xl-4">
                            <div class="post">
                                <a href="article.html" class="post__img">
                                    <img src="img/posts/11.jpg" alt="">
                                </a>

                                <div class="post__content">
                                    <h3 class="post__title"><a href="article.html">Free parking in the whole
                                            country</a></h3>
                                    <div class="post__meta">
                                        <span class="post__date"><svg xmlns="http://www.w3.org/2000/svg"
                                                viewBox="0 0 24 24">
                                                <path
                                                    d="M15,11H13V7a1,1,0,0,0-2,0v5a1,1,0,0,0,1,1h3a1,1,0,0,0,0-2ZM12,2A10,10,0,1,0,22,12,10.01114,10.01114,0,0,0,12,2Zm0,18a8,8,0,1,1,8-8A8.00917,8.00917,0,0,1,12,20Z" />
                                            </svg> January 9, 2022</span>
                                        <span class="post__comments"><svg xmlns="http://www.w3.org/2000/svg"
                                                viewBox="0 0 24 24">
                                                <path
                                                    d="M12,2A10,10,0,0,0,2,12a9.89,9.89,0,0,0,2.26,6.33l-2,2a1,1,0,0,0-.21,1.09A1,1,0,0,0,3,22h9A10,10,0,0,0,12,2Zm0,18H5.41l.93-.93a1,1,0,0,0,0-1.41A8,8,0,1,1,12,20Zm5-9H7a1,1,0,0,0,0,2H17a1,1,0,0,0,0-2Zm-2,4H9a1,1,0,0,0,0,2h6a1,1,0,0,0,0-2ZM9,9h6a1,1,0,0,0,0-2H9A1,1,0,0,0,9,9Z" />
                                            </svg> 0</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- end post -->

                        <!-- post -->
                        <div class="col-12 col-md-6 col-xl-4">
                            <div class="post">
                                <a href="article.html" class="post__img">
                                    <img src="img/posts/7.jpg" alt="">
                                </a>

                                <div class="post__content">
                                    <h3 class="post__title"><a href="article.html">What is car rental with redemption
                                            right?</a></h3>
                                    <div class="post__meta">
                                        <span class="post__date"><svg xmlns="http://www.w3.org/2000/svg"
                                                viewBox="0 0 24 24">
                                                <path
                                                    d="M15,11H13V7a1,1,0,0,0-2,0v5a1,1,0,0,0,1,1h3a1,1,0,0,0,0-2ZM12,2A10,10,0,1,0,22,12,10.01114,10.01114,0,0,0,12,2Zm0,18a8,8,0,1,1,8-8A8.00917,8.00917,0,0,1,12,20Z" />
                                            </svg> January 4, 2022</span>
                                        <span class="post__comments"><svg xmlns="http://www.w3.org/2000/svg"
                                                viewBox="0 0 24 24">
                                                <path
                                                    d="M12,2A10,10,0,0,0,2,12a9.89,9.89,0,0,0,2.26,6.33l-2,2a1,1,0,0,0-.21,1.09A1,1,0,0,0,3,22h9A10,10,0,0,0,12,2Zm0,18H5.41l.93-.93a1,1,0,0,0,0-1.41A8,8,0,1,1,12,20Zm5-9H7a1,1,0,0,0,0,2H17a1,1,0,0,0,0-2Zm-2,4H9a1,1,0,0,0,0,2h6a1,1,0,0,0,0-2ZM9,9h6a1,1,0,0,0,0-2H9A1,1,0,0,0,9,9Z" />
                                            </svg> 226</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- end post -->
                    </div>
                </div>
            </div>
        </div>
    </main>
    <!-- end main content -->
@endsection
