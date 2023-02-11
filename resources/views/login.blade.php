<!doctype html>
<html lang="en-US">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, minimum-scale=1, maximum-scale=1">
    <meta name="keywords" content="HTML5 Template">
    <meta name="description" content="Responsive HTML5 Template">
    <meta name="author" content="author.com">
    <title>Responsive HTML5 Template</title>

    <!-- STYLESHEET -->
    <!-- fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito+Sans:300,400,600,700,800" rel="stylesheet">

    <!-- icon -->
    <link rel="stylesheet" href="fonts/icons/main/mainfont/style.css">
    <link rel="stylesheet" href="fonts/icons/font-awesome/css/font-awesome.min.css">

    <!-- Vendor -->
    <link rel="stylesheet" href="vendor/bootstrap/v3/bootstrap.min.css">
    <link rel="stylesheet" href="vendor/bootstrap/v4/bootstrap-grid.css">
    <!-- Custom -->
    <link rel="stylesheet" href="css/style.css">

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->
</head>
<body>

<div class="signup">
    <!-- HEADER -->
    <header class="signup__header">
        <div class="container">
            <div class="signup__header-content">
                <p><a href="#">Already have an account?</a></p>
                <a href="#" class="btn">Sign In</a>
            </div>
        </div>
    </header>

    <!-- MAIN -->
    <main class="signup__main">
        <img class="signup__bg" src="images/signup-bg.png" alt="bg">

        <div class="container">
            <div class="signup__container">
                <div class="signup__logo">
                    <a href="#"><img src="fonts/icons/main/Logo_Forum.svg" alt="logo">Unity</a>
                </div>
                <form action="/login" method="POST" name="login" id="login">
                    @csrf
                <div class="signup__head">
                    <h3>Create a New Unity Account</h3>
                    <p>By singin up you can start posting, replaying to topics, earn badges, favorite, vote topics and many more.</p>
                </div>
                <div class="signup__form">
                    <x-form.input name="email" type="email"/>
                    <x-form.input name="password" type="password" />
                    <div class="signup__checkbox">
                        <div class="row">
                            <div class="col-md-6">
                                <label class="signup__box">
                                    <label class="custom-checkbox">
                                        <input type="checkbox" checked="checked">
                                        <i></i>
                                    </label>
                                    <span>I agree to the Terms & Conditions.</span>
                                </label>
                            </div>
                            <div class="col-md-6" data-visible="desktop">
                                <label class="signup__box">
                                    <label class="custom-checkbox">
                                        <input type="checkbox">
                                        <i></i>
                                    </label>
                                    <span>Subscribe to newsletter</span>
                                </label>
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="signup__btn-create btn btn--type-02">Create New Account</button>
                    </form>
                    @if($errors->any())
                    @foreach($errors->all() as $error)
                    <h1>{{ $error }}</h1>
                    @endforeach
                    @endif
                </div>
            </div>
        </div>
    </main>
    <!-- FOOTER -->
    <footer class="signup__footer">
        <div class="container">
            <div class="signup__footer-content">
                <ul class="signup__footer-menu">
                    <li><a href="#">Teams</a></li>
                    <li><a href="#">Privacy</a></li>
                    <li><a href="#">Send Feedback</a></li>
                </ul>
                <ul class="signup__footer-social">
                    <li><a href="#"><i class="fa fa-facebook-square" aria-hidden="true"></i></a></li>
                    <li><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                    <li><a href="#"><i class="fa fa-google-plus" aria-hidden="true"></i></a></li>
                    <li><a href="#"><i class="fa fa-dribbble" aria-hidden="true"></i></a></li>
                    <li><a href="#"><i class="fa fa-cloud" aria-hidden="true"></i></a></li>
                    <li><a href="#"><i class="fa fa-rss" aria-hidden="true"></i></a></li>
                </ul>
            </div>
        </div>
    </footer>
</div>

    <!-- JAVA SCRIPT -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/velocity/velocity.min.js"></script>
    <script src="js/app.js"></script>

</body>
</html>