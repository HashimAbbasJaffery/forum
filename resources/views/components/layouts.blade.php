<!DOCTYPE html>
<html lang="en-US">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, minimum-scale=1, maximum-scale=1">
    <meta name="keywords" content="HTML5 Template">
    <meta name="description" content="Responsive HTML5 Template">
    <meta name="author" content="author.com">
    <title>Responsive HTML5 Template</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- STYLESHEET -->
    <!-- fonts -->
    <link href="/https://fonts.googleapis.com/css?family=Nunito+Sans:300,400,600,700,800" rel="stylesheet">
      <script src="https://cdn.tailwindcss.com"></script>

    <!-- icon -->
    <link rel="stylesheet" href="/fonts/icons/main/mainfont/style.css">
    <link rel="stylesheet" href="/fonts/icons/font-awesome/css/font-awesome.min.css">

    <!-- Vendor -->
    <link rel="stylesheet" href="/vendor/bootstrap/v3/bootstrap.min.css">
    <link rel="stylesheet" href="/vendor/bootstrap/v4/bootstrap-grid.css">
    <!-- Custom -->
    <link rel="stylesheet" href="/css/style.css">

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="/https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="/https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->
    <script src = "https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js">
    </script>
</head>
<body>
    <i class="fa-regular fa-up"></i>
    <!-- HEADER -->
    <header>
        <div class="header js-header js-dropdown">
            <div class="container">
                <div class="header__logo">
                    <h1>
                        <img src="/fonts/icons/main/Logo_Forum.svg" alt="logo">
                    </h1>
                    <div class="header__logo-btn" data-dropdown-btn="logo">
                        Unity<i class="icon-Arrow_Below"></i>
                    </div>
                    <nav class="dropdown dropdown--design-01" data-dropdown-list="logo">
                        <ul class="dropdown__catalog">
                            <li><a href="/index.html">Home Page</a></li>
                            <li><a href="/single-topic.html">Single Topic Page</a></li>
                            <li><a href="/simple-signup.html">Sign up Page</a></li>
                            <li><a href="/create-topic.html">Create Topic Page</a></li>
                        </ul>
                    </nav>
                </div>
                <div class="header__search">
                    <form>
                        <label>
                            <i class="icon-Search js-header-search-btn-open"></i>
                            @if(request("category"))
                                <input type="hidden" id="category" name="category" value="{{ request("category") }}">
                            @endif
                            @if(request("tag"))
                                <input type="hidden" id="tag" name="tag" value="{{ request("tag")}}">
                            @endif    
                            <input type="search" id="search" onkeyup="getResults()" name="q" value="{{ request("q") }}" placeholder="Search all forums" class="form-control">
                        </label>
                    </form>
                    <div class="header__search-close js-header-search-btn-close"><i class="icon-Cancel"></i></div>
                    <div class="header__search-btn" data-dropdown-btn="search">
                        Topics<i class="icon-Arrow_Below"></i>
                    </div>
                    <div class="dropdown dropdown--design-01" data-dropdown-list="search">
                        <ul>
                            <li>
                                <label>
                                    <label class="custom-checkbox">
                                        <input type="checkbox" checked="checked">
                                        <i></i>
                                    </label>Search Titles Only
                                </label>

                            </li>
                            <li>
                                <label>
                                    <label class="custom-checkbox">
                                        <input type="checkbox">
                                        <i></i>
                                    </label>Show Results as Posts
                                </label>
                            </li>
                            <li>
                                <a href="/#">
                                    <i class="icon-Advanced_Search"></i>Advanced Search
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="header__menu">
                    <div class="header__menu-btn" data-dropdown-btn="menu">
                        Latest Topics<i class="icon-Menu_Icon"></i>
                    </div>
                    <nav class="dropdown dropdown--design-01" data-dropdown-list="menu">
                        <div>
                            <ul class="dropdown__catalog row">
                                <li class="col-xs-6"><a href="/#">New</a></li>
                                <li class="col-xs-6"><a href="/#">Unread</a></li>
                                <li class="col-xs-6"><a href="/#">Groups</a></li>
                                <li class="col-xs-6"><a href="/#">Users</a></li>
                                <li class="col-xs-6"><a href="/#">Tags</a></li>
                                <li class="col-xs-6"><a href="/#">Shortcuts</a></li>
                            </ul>
                        </div>
                        <div>
                            <h3>Categories</h3>
                            <ul class="dropdown__catalog row">
                                <li class="col-xs-6"><a href="/#" class="category"><i class="bg-f9bc64"></i>Hobbies</a></li>
                                <li class="col-xs-6"><a href="/#" class="category"><i class="bg-348aa7"></i>Social</a></li>
                                <li class="col-xs-6"><a href="/#" class="category"><i class="bg-4436f8"></i>Video</a></li>
                                <li class="col-xs-6"><a href="/#" class="category"><i class="bg-5dd39e"></i>Random</a></li>
                                <li class="col-xs-6"><a href="/#" class="category"><i class="bg-ff755a"></i>Arts</a></li>
                                <li class="col-xs-6"><a href="/#" class="category"><i class="bg-bce784"></i>Tech</a></li>
                                <li class="col-xs-6"><a href="/#" class="category"><i class="bg-83253f"></i>Gaming</a></li>
                                <li class="col-xs-6"><a href="/#" class="category"><i class="bg-c49bbb"></i>Science</a></li>
                                <li class="col-xs-6"><a href="/#" class="category"><i class="bg-3ebafa"></i>Exchange</a></li>
                                <li class="col-xs-6"><a href="/#" class="category"><i class="bg-c6b38e"></i>Pets</a></li>
                                <li class="col-xs-6"><a href="/#" class="category"><i class="bg-a7cdbd"></i>Entertainment</a></li>
                                <li class="col-xs-6"><a href="/#" class="category"><i class="bg-525252"></i>Education</a></li>
                                <li class="col-xs-6"><a href="/#" class="category"><i class="bg-777da7"></i>Q&amp;As</a></li>
                                <li class="col-xs-6"><a href="/#" class="category"><i class="bg-368f8b"></i>Politics</a></li>
                            </ul>
                        </div>
                        <div>
                            <ul class="dropdown__catalog row">
                                <li class="col-xs-6"><a href="/#">Support</a></li>
                                <li class="col-xs-6"><a href="/#">Forum Rules</a></li>
                                <li class="col-xs-6"><a href="/#">Blog</a></li>
                                <li class="col-xs-6"><a href="/#">About</a></li>
                            </ul>
                        </div>
                    </nav>
                </div>
                <div class="header__notification">
                    @auth 
                        <div class="header__notification-btn" onclick="messagesRead({{ auth()->user()->id }})" data-dropdown-btn="notification">
                            <i class="icon-Notification"></i>
                            <span>{{ count($unReadNotifications) }}</span>
                        </div>
                    @endauth
                    <div class="dropdown dropdown--design-01" data-dropdown-list="notification">
                        <div class="{{ (count($unReadNotifications)) ? "overflow-scroll h-96" : "" }}" >
                            @if(count($unReadNotifications)) 
                                @foreach($unReadNotifications as $notifications)
                                    <a href="/#">
                                        <p>{{ date('d-M-Y', strtotime($notifications->created_at)) }}</p>
                                            <p>{!! $notifications->message !!}</p>
                                    </a>
                                @endforeach
                            @else 
                                <span><a href="/#">view older notifications...</a></span>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="header__user">
                    @auth
                    <div class="mr-3">
                        <x-details 
                            :user="auth()->user()->id" 
                            :letter="auth()->user()->username[0] ?? 'A'"
                        />
                    </div>
                        <div class="header__user-btn" data-dropdown-btn="user">
                            {{ auth()->user()->username }}<i class="icon-Arrow_Below"></i>
                        </div>
                    @else
                        <a href="/login" class="mr-10 hover:text-black"><p>Login</p></a>
                        <a href="/register" class="hover:text-black"><p>Register</p></a>
                    @endauth 
                    <nav class="dropdown dropdown--design-01" data-dropdown-list="user">
                        <div>
                            <div class="dropdown__icons">
                                <button href="/#"><i class="icon-Bookmark"></i></button>
                                <button href="/#"><i class="icon-Message"></i></button>
                                <button href="/#"><i class="icon-Preferences"></i></button>
                                @auth
                                    <form action="/logout" method="post">
                                        @csrf
                                        <button href="/#"><i class="icon-Logout"></i></button>
                                    </form>
                                @endauth
                            </div>
                        </div>
                        @auth
                            <div>
                                <ul class="dropdown__catalog">
                                    <li><a href="/questions/{{ auth()->user()->username }}">My Questions</a></li>
                                    <li><a href="/profile/{{ auth()->user()->username }}">Profile</a></li>
                                    <li><a href="/#">Edit Profile</a></li>
                                    <li><a href="/#">Badges</a></li>
                                    <li><a href="/#">My Groups</a></li>
                                    <li><a href="/#">Notifications</a></li>
                                    <li><a href="/#">Topics</a></li>
                                    <li><a href="/#">Likes</a></li>
                                    <li><a href="/#">Solved</a></li>
                                </ul>
                            </div>
                        @endauth
                    </nav>
                </div>
            </div>
            <div class="header__offset-btn">
                <a href="/create-topic.html"><img src="/fonts/icons/main/New_Topic.svg" alt="New Topic"></a>
            </div>
        </div>
    </header>
    <main>
        <div class="container">
    		{{ $slot }}
    	</div>
    </main>
    <!-- FOOTER -->
    <footer>
        <div class="footer js-dropdown">
            <div class="container">
                <div class="footer__logo">
                    <div>
                        <img src="/fonts/icons/main/Logo_Forum.svg" alt="logo">Unity
                    </div>
                </div>
                <div class="footer__nav">
                    <div class="footer__tline">
                        <i class="icon-Support"></i>
                        <ul class="footer__menu">
                            <li><a href="/#">Support</a></li>
                            <li><a href="/#">About</a></li>
                            <li><a href="/#">Contact Us</a></li>
                            <li><a href="/#">The Team</a></li>
                        </ul>
                        <div class="footer__language">
                            <div class="footer__language-btn" data-dropdown-btn="language">Americas - English<i class="icon-Arrow_Below"></i></div>
                            <div class="footer__language-dropdown dropdown dropdown--design-01 dropdown--reverse-y" data-dropdown-list="language">
                                <div class="row">
                                    <div class="col-xs-6">
                                        <h3>Region</h3>
                                        <ul class="dropdown__catalog">
                                            <li class="active"><a href="/#"><i></i>America</a></li>
                                            <li><a href="/#"><i></i>Europe</a></li>
                                            <li><a href="/#"><i></i>Asia</a></li>
                                            <li><a href="/#"><i></i>China</a></li>
                                            <li><a href="/#"><i></i>Australia</a></li>
                                        </ul>
                                    </div>
                                    <div class="col-xs-6">
                                        <h3>Language</h3>
                                        <ul class="dropdown__catalog">
                                            <li class="active"><a href="/#"><i></i>English</a></li>
                                            <li><a href="/#"><i></i>Espanol</a></li>
                                            <li><a href="/#"><i></i>Portugues</a></li>
                                            <li><a href="/#"><i></i>Chinese</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="footer__bline">
                        <ul class="footer__menu">
                            <li class="footer__copyright"><span>&copy; 2017 azyrusthemes.com</span></li>
                            <li><a href="/#">Teams</a></li>
                            <li><a href="/#">Privacy</a></li>
                            <li><a href="/#">Send Feedback</a></li>
                        </ul>
                        <ul class="footer__social">
                            <li><a href="/#"><i class="fa fa-facebook-square" aria-hidden="true"></i></a></li>
                            <li><a href="/#"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                            <li><a href="/#"><i class="fa fa-google-plus" aria-hidden="true"></i></a></li>
                            <li><a href="/#"><i class="fa fa-dribbble" aria-hidden="true"></i></a></li>
                            <li><a href="/#"><i class="fa fa-cloud" aria-hidden="true"></i></a></li>
                            <li><a href="/#"><i class="fa fa-rss" aria-hidden="true"></i></a></li>
                        </ul>
                        <div class="footer__language-btn-m" data-dropdown-btn="language">Americas - English<i class="icon-Arrow_Below"></i></div>
                    </div>
                </div>
            </div>
        </div>
        @auth 
            <input type="hidden" name="username" id="username" value="{{ auth()->user()->username }}">
        @endauth
    </footer>
    <!-- JAVA SCRIPT -->
    <script src="/vendor/jquery/jquery.min.js"></script>
    <script src="/vendor/velocity/velocity.min.js"></script>
    <script src="/js/app.js"></script>
    <script>
        // bg-gray-200
        const collection = [];
        const addTag = tagId => {
            let i = 0;
            let flag = false;
            for(id of collection) {
                if(id == tagId) {
                    collection.splice(i, 1);
                    flag = true;
                    document.getElementById(`tag-${id}`).classList.remove("bg-gray-200");
                }
                i++;
            }
            if(!flag) {
                collection.push(tagId);
                collection.forEach(id => {
                    const tag = document.getElementById(`tag-${id}`).classList.add("bg-gray-200");
                })
            }
            document.getElementById("tags").value = collection.toString();
        }
    </script>
    <script>
        
        const topicBody = document.getElementById("topics");
        const getTags = tags => {
            let tagsMarkup = "";
            tags.forEach(tag => {
                tagsMarkup += `<a href='?tag=${tag.name}' class="bg-a3d39c">${tag.name}</a>`;
            });
            return tagsMarkup; 
                                        
        }
        const getMarkup = detail => {
            return `<div class="posts__item bg-f2f4f6">                     
                    <div class="posts__section-left">
                            <div class="posts__topic">
                                <div class="posts__content">
                                    <a href="/question/${detail.slug}">
                                        <h3>${detail.title}</h3>
                                    </a>
                                    <div class="posts__tags tags">
                                        ${getTags(detail.tags)}
                                    </div>
                                </div>
                            </div>
                            <div class="posts__category"><a href="/category/wait" class="category"><i class="bg-a7cdbd"></i> wait</a></div>
                        </div>
                        </div>`
        }
        function changeUrl(data) {
            const filters = document.getElementById("filters").value;
            if(!filters) {
                history.pushState(null, null, `?q=${data}`);
            } else {
                history.pushState(null, null, `?${filters}&q=${data}`);
            }
        } 
        function getResults() {
            let usernameElement = document.getElementById("username");
            let currentUrl = window.location.href;
            let parsedUrl = new URL(currentUrl);
            let url = `/search/?`;
            if($("#search").length > 0)
                url += `&q=${document.getElementById("search").value}`;
            if($("#category").length > 0)
                url += `&category=${document.getElementById("category").value}`
            if($("#tag").length > 0)
                url += `&tag=${document.getElementById("tag").value}`;
            if(usernameElement && parsedUrl.pathname.includes("/questions/")) {
                url += `&user=${usernameElement.value}`;
            }
            $.ajax(
                {
                    type: 'GET',
                    url: url,
                    data:'_token = <?php echo csrf_token() ?>',
                    success: function(data) {
                        const details = data;
                        $("#topics").html(details)
                        const tagButtons = document.querySelectorAll(".tag-buttons");
                        const categories = document.querySelectorAll(".categories");
                        const keyword = document.getElementById("search").value;
                        changeUrl(keyword);
                        categories.forEach(category => {
                            const attr = category.getAttribute("category-data");
                            category.setAttribute("href", `${attr}q=${keyword}`);
                        })
                        tagButtons.forEach(button => {
                            const attr = button.getAttribute("data-url");
                            button.setAttribute("href", `${attr}q=${keyword}`);
                        })
                    }
                }
            )
        }
        const success = (element, enteredChars, max,msgID) => {
            const remaining = max - enteredChars;
            const userMessageId = document.getElementById(msgID);
            userMessageId.textContent = `${remaining} more characters remining`;
            element.style.border = "1px solid green";
        }
        const failed = (element, min, max, msgID) => {
            const chars = element.value.length;
            const messageID = document.getElementById(msgID);
            let required;
            element.style.border = "1px solid red";
            if(chars < min) {
                required = min - chars;
                messageID.textContent = `${required} more characters to go.....`;
            }
            if(chars > max) {
                required = chars - max;
                messageID.textContent = `You have Typed extra ${required} character(s)`;
            }
        }
        function characterAuth(min, max, id, messageID) {
            const element = document.getElementById(id);
            const message = document.getElementById(messageID);
            const len = element.value.length;
            if(len >= min && len <= max) {
                success(element, len, max, messageID);
            } else {
                failed(element, min, max, messageID);
            }
            message.style.display = "block";
        }
        const messagesRead = (id) => {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax(
                {
                    method: 'POST',
                    url: "/notification/{{ (auth()->user()) ? auth()->user()->id : null}}/update",
                    // contentType: "multipart/form-data; charset=utf-8; boundary=" + Math.random().toString().substr(2),
                    success: function(data) {
                        console.log(data);
                    }
                }
            )
        }
    </script>
    
</body>
</html>