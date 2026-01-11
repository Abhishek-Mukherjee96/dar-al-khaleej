@extends('frontend.layouts.app')
@section('title', 'FAQ')
@section('content')
<section class="bannerInnerWrap">
    <div class="bannerInner">
        <img src="frontend/assets/images/inner-banner.jpg" alt="">
        <div class="desc">
            <div class="container">
                <div class="text">
                    <h1>FAQ</h1>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="faq-section">
    <div class="container">
        <div class="ttl">
            <h2 class="siteTtl">Have a Questions</h2>
        </div>
        <div class="accordion accordion-flush" id="accordionExample">
            <!-- 1: coll1 -->
            <div class="accordion-item">
                <h2 class="accordion-header">
                    <!--   data-bs-target="#coll1",  controls="coll1", id="coll1", aria-expanded="true"      -->
                    <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#coll1" aria-expanded="true" aria-controls="coll1">
                        <h5> What is Semantic HTML and how does it work?</h5>
                    </button>
                </h2>
                <!-- show : by default Always open -->
                <div id="coll1" class="accordion-collapse collapse show" data-bs-parent="#accordionExample">
                    <div class="accordion-body">
                        Semantic HTML refers to a method of coding where HTML markup is used to emphasise the meaning or semantics of the existing content.
                    </div>
                </div>
            </div>

            <!-- 2: coll2 -->
            <div class="accordion-item">
                <h2 class="accordion-header">
                    <!--       collapsed,   aria-expanded="false"   -->
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#coll2" aria-expanded="false" aria-controls="coll2">
                        <h5> What do you know about the Box Sizing property?</h5>
                    </button>
                </h2>
                <div id="coll2" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                    <div class="accordion-body">
                        The Box Sizing property in CSS defines how developers should calculate the width and height of a box.

                        Content Box is when the default height and width get applied to the content of an element. The border and padding lie outside the box.

                        Padding Box is when the developer adds the dimensions to include the padding and content of the element. This adds a border outside the given box.

                        Border Box is when the box dimensions apply to the border, padding and content.
                    </div>
                </div>
            </div>

            <!-- 3: coll3 -->
            <div class="accordion-item">
                <h2 class="accordion-header">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#coll3" aria-expanded="false" aria-controls="coll3">
                        <h5> Define the ways in which you can hide an element using CSS.</h5>
                    </button>
                </h2>
                <div id="coll3" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                    <div class="accordion-body">
                        There are three ways to hide elements with CSS.

                        display:none can hide the content so that it doesn’t get stored in the DOM.

                        visibility:hidden adds an element to the DOM and occupies space. However, the user cannot see it.

                        position:absolute makes the element appear outside the screen, not on the screen.
                    </div>
                </div>
            </div>

            <!-- 4: coll4 -->
            <div class="accordion-item">
                <h2 class="accordion-header">
                    <!--   target="#coll4",  id="coll4"  -->
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#coll4" aria-expanded="false" aria-controls="coll4">
                        <h5> What does Callback mean in JavaScript?</h5>
                    </button>
                </h2>
                <div id="coll4" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                    <div class="accordion-body">
                        Callback is a JavaScript function that developers send as a parameter or argument to other functions. You can call this function whenever the function it is provided to gets called.
                    </div>
                </div>
            </div>

            <!-- 5: coll5 -->
            <div class="accordion-item">
                <h2 class="accordion-header">
                    <!--   target="#coll5",  id="coll5"  -->
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#coll5" aria-expanded="false" aria-controls="coll5">
                        <h5> Differences between Undefined, Undeclared and Null in JavaScript.</h5>
                    </button>
                </h2>
                <div id="coll5" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                    <div class="accordion-body">
                        Undefined refers to a situation where a variable is declared but no value has been assigned to the variable yet.<br />
                        ex.
                        let a;
                        console.log(a); // Output: undefined

                        <br />

                        Null refers to the assignment of value to a variable that isn’t meant to contain any value.<br />
                        ex. let b = null;
                        console.log(b); // Output: null
                        <br />

                        Undeclared refers to variables that don’t exist in an application or program or haven’t been declared. <br />
                        ex.
                        console.log(c); // ReferenceError: c is not defined

                    </div>
                </div>
            </div>

            <!-- 6: coll6 -->
            <div class="accordion-item">
                <h2 class="accordion-header">
                    <!--   target="#coll6",  id="coll6"  -->
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#coll6" aria-expanded="false" aria-controls="coll6">
                        <h5> How to optimize website assets loading?</h5>
                    </button>
                </h2>
                <div id="coll6" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                    <div class="accordion-body">
                        <ul>
                            <li><a href="https://tinypng.com/"> Image compress</a> - This is a method that helps to reduce the size of an asset to reduce the data transfer</li>
                            <li> <a href="https://www.minifier.org/">Minify scripts</a> - This reduces the overall file size of js and CSS files</li>
                            <li><a href="">File concatenation</a> - This reduces the number of HTTP calls</li>
                            <li><a href="">CDN hosting</a> - A CDN or content delivery network is geographically distributed servers to help reduce latency.</li>
                            <li><a href="">Lazy Loading</a> - Instead of loading all the assets at once, the non-critical assets can be loaded on a need basis.</li>
                            <li><a href="">Parallel downloads</a> - Hosting assets in multiple subdomains can help to bypass the download limit of 6 assets per domain of all modern browsers. This can be configured but most general users never modify these settings.
                            </li>
                        </ul>
                    </div>
                </div>
            </div>

            <!-- 7: coll7 -->
            <div class="accordion-item">
                <h2 class="accordion-header">
                    <!--   target="#coll7",  id="coll7"  -->
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#coll7" aria-expanded="false" aria-controls="coll7">
                        <h5> How to open your local website on localhost XAMPP from your mobile device?</h5>
                    </button>
                </h2>
                <div id="coll7" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                    <div class="accordion-body">
                        <h6> <b>Follow these Steps: </b> Access PC localhost (XAMPP Server) from mobile</h6><br />
                        <!--                 <ol>
                    <li> Connect PC and mobile Both Devices to the Same Network (wifi/hotsport)</li>
                    <li>
                        Project Setup
                        <ul>
                        <li>First, create your project using HTML, CSS, and JavaScript.
                        </li>
                        <li>
                            Once your project is ready, copy the project folder.</li>
                        </ul>
                    </li>
                    <li>
                        Paste Project in XAMPP
                        <ul>
                        <li>Go to: Local Disk (C:) > xampp > htdocs</li>
                        <li>Paste your project folder there</li>
                        </ul>
                    </li>
                    <li> Open Project in VS Code<ul><li>Open project folder in VS Code.</li>
                        <li>If you don’t have Live Server installed: Go to Extensions (Ctrl+Shift+X), search "Live Server", and install it.
                        </li>
                        <li>If already installed:Click on “Go Live” (bottom-right in VS Code).</li>
                <li>live server IPv4 address (e.g., 192.xyz.ab.c),  Live Server is running on port 3000, link http://192.xyz.ab.c:3000</li>       </ul></li>
                    <li> Open XAMPP
                        <ul>
                        <li>Apache start config</li>
                        <li>MySQL start config</li>
                        </ul>
                    </li>
                    
                    <li> Find Your Computer’s Local IP Address
                        <ul>
                        <li>Run (Press Windows + R)</li>
                        <li>Open CMD: Type cmd and hit Enter</li>
                        <li>Type ipconfig</li>
                        <li>copy IPV4 adress http://192.168.---:3000 and your local server is running on port 3000</li>
                        </ul>
                    </li>
                    <li> Open Your Local Website on Mobile Device
                        <ul>
                        <li>open mobile browser (chrome)</li>
                        <li>type ip address http://192.168.---:3000</li>
                        </ul>
                    </li>
                    <li> Test and Enjoy!</li>
                    </ol> -->

                        <ol>
                            <li> Connect PC and mobile Both Devices to the Same Network (wifi/hotsport)</li>

                            <li>
                                Project Setup
                                <ul>
                                    <li>First, create your project using HTML, CSS, and JavaScript.
                                    </li>
                                    <li>
                                        Once your project is ready, copy the project folder.</li>
                                </ul>
                            </li>

                            <li>
                                Paste Project in XAMPP
                                <ul>
                                    <li>Go to: Local Disk (C:) > xampp > htdocs</li>
                                    <li>Paste your project folder there</li>
                                </ul>
                            </li>
                            <li> Open XAMPP
                                <ul>
                                    <li>Apache start config</li>
                                    <li>MySQL start config</li>
                                </ul>
                            </li>
                            <li> Open Project in VS Code
                                <ul>
                                    <li>Open project folder in VS Code.</li>
                                    <li>If you don’t have Live Server installed: Go to Extensions (Ctrl+Shift+X), search "Live Server", and install it.
                                    </li>
                                    <li>If already installed:Click on “Go Live” (bottom-right in VS Code).</li>
                                    <li>live server IPv4 address (e.g., 192.xyz.ab.c), Live Server is running on port 3000, vs code ip address link http://192.xyz.ab.c:3000</li>
                                </ul>
                            </li>

                            <li> Find Your Computer’s Local IP Address
                                <ul>
                                    <li>Run (Press Windows + R)</li>
                                    <li>Open CMD: Type cmd and hit Enter</li>
                                    <li>Type ipconfig</li>
                                    <li>copy IPV4 adress http://192.168.---:3000 and your local server is running on port 3000</li>
                                </ul>
                            </li>

                            <li> Open Your Local Website on Mobile Device
                                <ul>
                                    <li>open mobile browser (chrome)</li>
                                    <li>step-6, type ip address http://192.168.---:3000, http://your-ip-address:vs code port 3000</li>
                                    <li>Note: Don’t remove :3000 at the end.</li>
                                </ul>
                            </li>
                            <li> Test and Enjoy!</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection