@php 
    use App\Models\Auth\User;
    use App\Models\System\Configuration;

    $user = User::first();
    $introBG = Configuration::get('selected_bg');
    $font = Configuration::get('font_family');
    $primary = Configuration::get('primary_color');
@endphp
<style> 
    /*
        ---------------------------------------------------------------------
        THEME NAME  :   PHAMID NEOLA
        AUTHOR      :   JALAL UDDIN (www.github.com/dgvai) 
        ---------------------------------------------------------------------
        
    */
    @import url('https://fonts.googleapis.com/css?family={{$font}}:200,300,400,600&display=swap');

    :root {
        --color-primary : {{$primary}};
        --color-primary-a-5 : {{$primary.'BF'}};
        --color-primary-a-25 : {{$primary.'40'}};
        --color-dark : #1a1a1a;
        --color-gray: #f2f2f2;
        --color-light: #fefefe;
        --font-family : '{{str_replace('+',' ',$font)}}', sans-serif;
    }

    * {
        scrollbar-width: thin;
        scrollbar-color: var(--color-primary) var(--color-dark);
    }

    /* Works on Chrome/Edge/Safari */
    *::-webkit-scrollbar {
        width: 12px;
    }

    *::-webkit-scrollbar-track {
        background: var(--color-dark);
    }

    *::-webkit-scrollbar-thumb {
        background-color: var(--color-primary);
        border-radius: 20px;
        border: 3px solid var(--color-dark);
    }

    html {
        scroll-behavior: smooth;
    }

    *, h1, h2, h3 {
        font-family: var(--font-family);
    }

    body {
        margin: 0;
        padding: 0;
        font-family: var(--font-family);
        line-height: 1;
        color: var(--color-dark);
    }

    a {
        color: var(--color-light);
        text-decoration: none;
    }

    a:hover {
        color: var(--color-light);
        text-decoration: none;
    }

    .font-lighter { font-weight: 200; } .font-light { font-weight: 300; } .font-regular { font-weight: 400; } .font-medium { font-weight: 600; } .font-bold { font-weight: 900; }
    .gray-bg {background-color: var(--color-gray);}
    .light-bg {background-color: var(--color-light);}
    .main-bg {background-color: var(--color-primary);}
    .primary {color: var(--color-primary);}
    .light {color: var(--color-light);}

    .white-box {
        background: var(--color-light);
        box-shadow: 0 0 10px rgba(0, 0, 0, .2);
        padding: 30px;
        border-radius: 10px;
        width: 58rem;
        transition: all 0.5s;
    }

    .white-box:hover {
        box-shadow: 0 0 20px rgba(0, 0, 0, .3);
    }

    .white-box-auto {
        background: var(--color-light);
        box-shadow: 0 0 10px rgba(0, 0, 0, .2);
        padding: 30px;
        border-radius: 10px;
        transition: all 0.5s;
        margin: 0 4rem
    }

    .white-box-auto:hover {
        box-shadow: 0 0 20px rgba(0, 0, 0, .3);
    }

    .outline-button {
        background: transparent;
        border: 2px var(--color-primary) solid;
        font-size: 0.6rem;
        border-radius: 5px;
        text-transform: uppercase;
        color: var(--color-primary);
        padding: 0.5rem;
        text-decoration: none;
        transition: all 0.5s;
    }

    .outline-button:hover {
        background: var(--color-primary);
        color: var(--color-light);
        text-decoration: none;
    }

    .main-button {
        background: var(--color-primary);
        font-size: 0.6rem;
        border-radius: 5px;
        text-transform: uppercase;
        color: var(--color-light);
        padding: 0.8rem;
        text-decoration: none;
        transition: all 0.5s;
    }
    
    .main-button:hover {
        box-shadow: 0 0 10px rgba(0, 0, 0, .5);
        text-decoration: none;
        color: var(--color-light);
    }

    .dg-input i, .dg-input input, .dg-input textarea {
        font-size: 20px;
        color: var(--color-primary);
    }

    .dg-input input:focus,.dg-input textarea:focus {
        border-color: var(--color-primary); 
    }
    .dg-input input:focus:hover,.dg-input textarea:focus:hover {
        border-color: var(--color-primary); 
    }

    .dg-input .input-group-text.top {
        align-items: start;
        margin-top: 4px; 
    } 
    
    #portfolio {
        background: rgba(0, 0, 0, .65) url('{{$user->cover_photo}}') center center;
        background-blend-mode: darken;
        width: 100%;
        min-height: 100vh;
        background-size: cover;
        color: var(--color-light);
        text-transform: uppercase;
    }

    #portfolio .holder {
        padding: 30vh 0 0 0;
    }

    #portfolio .up {
        font-size: 1.5rem;
    }
    #portfolio .name {
        font-size: 5rem;
        letter-spacing: 2px;
        text-shadow: 0 0 15px #ffffff72;
    }
    #portfolio .title {
        font-size: 2rem;
    }

    #nav {
        position: absolute;
        bottom: 0;
        width: 100%;
        background: rgba(255, 255, 255, 0.2);
        backdrop-filter: blur(10px);
    }

    #nav ul {
        list-style: none;
    }

    #nav ul li {
        padding: 10px;
        display: inline;
        transition: all 0.5s;
    }
    #nav ul li:hover {
        text-shadow: 0px 0px 6px #FEFEFE;
    }
    #nav ul li a {
        color: var(--color-light);
        text-decoration: none;
    }

    #nav ul li.active {
        text-shadow: 0px 0px 6px #FEFEFE;
    }

    #nav .navbar {
        margin: auto;
        padding: 0.25rem 1.5rem;
    }

    #sticky-nav {
        position: fixed;
        top: 0;
        width: 100%;
        background: var(--color-primary-a-5);
        backdrop-filter: blur(10px);
        box-shadow: 0 2px 20px rgba(0, 0, 0, .2);
        z-index: 500;
        transition: all 0.5s;
    }

    #sticky-nav .navbar-brand {
        font-family: var(--font-family);
    }

    #fixed-nav {
        position: fixed;
        top: 0;
        width: 100%;
        background: var(--color-primary-a-5);
        backdrop-filter: blur(10px);
        box-shadow: 0 2px 20px rgba(0, 0, 0, .2);
        z-index: 500;
        transition: all 0.5s;
        text-transform: uppercase;
    }

    #fixed-nav .navbar-brand {
        font-family: var(--font-family);
    }

    @media only screen and (max-width: 768px) {
        #nav {
            display: none;
        }
        #portfolio .name {
            font-size: 2rem;
        }
        #portfolio .up, #portfolio .title {
            font-size: 1rem;
        }
    }

    #intro {
        min-height: 100vh;
        position: relative;
        z-index: 1;
    }

    #intro::before {
        content: '';
        position: absolute;
        width: 100%;
        height: 100%;
        z-index: -1;
        background: var(--color-gray) url('{{asset('storage/app/patterns/'.$introBG)}}') center center;
        background-size: cover;
        background-blend-mode: luminosity;
        opacity: 0.5;
    }

    #intro .user-data {
        display: flex;
        flex-direction: row;
    }

    #intro .summary, #intro .data {
        flex: 1;
        padding: 20px;
    }

    @media only screen and (max-width: 768px) {
        #intro .user-data {
            flex-direction: column-reverse;
        }

        #intro .data {
            text-align: center;
        }

        #intro .summary {
            font-size: 0.75rem;
        }

        #intro .data h2{
            font-size: 1.5rem;
        }

        #intro .summary, #intro .data {
            flex: 1;
            padding: 5px;
        }
    }

    #services {
        min-height: 100vh;
        padding: 3rem 0;
        box-shadow: 0 0 20px rgba(0,0,0,0.25);
        z-index: 2;
        position: relative;
    }

    #services .service-items {
        display: flex;
        flex-direction: row;
    }

    #services .service-items .item {
        background: var(--color-primary);
        position: relative;
        padding: 3rem;
        border-radius: 10px;
        color: var(--color-light);
        margin: 2rem;
        max-width: 20rem;
        min-height: 20rem;
        overflow: hidden;
        box-shadow: 0 0 10px rgba(0, 0, 0, .2);
        transition: all 0.5s;
    }

    #services .service-items .item:hover {
        box-shadow: 0 0 20px rgba(0, 0, 0, .5)
    }

    #services .service-items .item .icon {
        position: absolute;
        width: 100%;
        padding: 2rem;
        left: 0;
        top: 1rem;
        color: var(--color-dark);
        z-index: 10;
        opacity: 0.35;
    }

    #services .service-items .item .text {
        font-size: 0.8rem;
        line-height: 1.2;
    }

    #services .service-items .item div {
        z-index: 20;
    }

    @media only screen and (max-width: 768px) {
        #services h1 {
            font-size: 1.25rem;
            text-align: center;
        }
        #services .service-items {
            flex-direction: column;
        }
    }

    #skills {
        min-height: 100vh;
    }

    #skills .progress-outer{
        background: #fff;
        border-radius: 50px;
        padding: 3px;
        margin: 10px 0;
        box-shadow: 0 0  10px rgba(209, 219, 231,0.7);
    }
    #skills .progress{
        position: relative;
        height: 1.25rem;
        margin: 0;
        overflow: visible;
        border-radius: 50px;
        background: #eaedf3;
        box-shadow: inset 0 10px  10px rgba(244, 245, 250,0.9);
    }
    #skills .progress .progress-bar{
        border-radius: 50px;
        height: 1.25rem;
        background-color: var(--color-primary);
        box-shadow:-1px 10px 10px var(--color-primary-a-25);
    }
    #skills .progress .progress-name{
        position: absolute;
        left: 10px;
        top: 5px;
        font-size: 14px;
        font-weight: bold;
        color: var(--color-light);
    }
    #skills .progress .progress-value{
        position: relative;
        left: 2px;
        top: 4px;
        font-size: 14px;
        font-weight: bold;
        color: var(--color-primary);
    }
    #skills .progress-bar.active{
        animation: reverse progress-bar-stripes 0.40s linear infinite, animate-positive 2s;
    }
    @-webkit-keyframes animate-positive{
        0% { width: 0%; }
    }
    @keyframes animate-positive {
        0% { width: 0%; }
    }

    #projects {
        min-height: 100vh;
        z-index: 1;
    }

    #projects .project-items {
        display: flex;
        justify-content: center;
    }

    #projects .project-items .item {
        display: flex;
        flex-direction: row;
    }

    #projects .project-items .item .poster, #projects .project-items .item .data {
        flex : 1
    }

    #projects .project-items .item .poster img {
        width: 25rem;
        border-radius: 5px;
    }

    #projects .project-items .item .data {
        position: relative;
    }
    #projects .project-items .item .data .bot-btn {
        position: absolute;
        bottom: 0;
        margin-left: auto;
        margin-right: auto;
        left: 0;
        right: 0;
        text-align: center;
    }

    @media only screen and (max-width: 768px) {
        #projects h1 {
            font-size: 1.25rem;
            text-align: center;
        }
        #projects .project-items .item {
            flex-direction: column;
            text-align: center;
            min-height: 20rem;
        }
        #projects .project-items .item h3 {
            font-size: 1rem;
            margin: 10px 0;
            line-height: 1.25rem;
        }
        #projects .project-items .item p {
            display: none;
        }
        #projects .project-items .item .poster img {
            width: 100%;
        }
        #projects .project-items .item .data .bot-btn {
            position: relative;
            bottom: 0;
            margin-left: auto;
            margin-right: auto;
            left: 0;
            right: 0;
            text-align: center;
        }
    }

    @media only screen and (max-width:480px) {
        #projects .project-items .item .data .bot-btn {
            position: absolute;
            bottom: 0;
            margin-left: auto;
            margin-right: auto;
            left: 0;
            right: 0;
            text-align: center;
        } 
    }

    #gallery {
        min-height: 100vh;
        z-index: 1;
        padding: 3rem;
    }

    #gallery .grid {
        display: grid;
        grid-gap: 30px;
        grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
        grid-auto-rows: 150px;
        grid-auto-flow: row dense;
    }

    #gallery .item {
        position: relative;
        display: -webkit-box;
        display: flex;
        -webkit-box-orient: vertical;
        -webkit-box-direction: normal;
        flex-direction: column;
        -webkit-box-pack: end;
        justify-content: flex-end;
        box-sizing: border-box;
        color: #fff;
        grid-column-start: auto;
        grid-row-start: auto;
        color: #fff;
        box-shadow: -2px 2px 10px 0px rgba(68, 68, 68, 0.4);
        -webkit-transition: -webkit-transform 0.3s ease-in-out;
        transition: -webkit-transform 0.3s ease-in-out;
        transition: transform 0.3s ease-in-out;
        transition: transform 0.3s ease-in-out, -webkit-transform 0.3s ease-in-out;
        cursor: pointer;
        counter-increment: item-counter;
    }

    #gallery .item:after {
        content: "";
        position: absolute;
        width: 100%;
        height: 100%;
        background-color: black;
        opacity: 0.3;
        -webkit-transition: opacity 0.3s ease-in-out;
        transition: opacity 0.3s ease-in-out;
    }

    #gallery .item:hover {
        -webkit-transform: scale(1.05);
        transform: scale(1.05);
    }

    #gallery .item:hover:after {
        opacity: 0;
    }

    #gallery .item--medium {
        grid-row-end: span 2;
    }

    #gallery .item--large {
        grid-row-end: span 4;
    }

    #gallery .item--full {
        grid-column-end: auto;
    }

    @media screen and (min-width: 768px) {
        #gallery .item--full {
            grid-column: 1/-1;
            grid-row-end: span 2;
        }
    }

    @media only screen and (max-width: 480px) {
        #gallery {
            padding: 2rem;
        }
    }

    #gallery-modal .modal-content {
        background: rgba(255, 255, 255, 0.5);
        backdrop-filter: blur(10px);
        padding: 0.5rem;
    }

    #gallery .item__details {
        position: relative;
        z-index: 1;
        padding: 15px;
        color: #444;
        background: #fff;
        text-transform: lowercase;
        letter-spacing: 1px;
        color: #828282;
    }

    #gallery .item__details:before {
        content: counter(item-counter);
        font-weight: bold;
        font-size: 1.1rem;
        padding-right: 0.5em;
        color: #444;
    }


    #resume {
        min-height: 100vh;
        padding: 3rem 0;
        box-shadow: 0 0 20px rgba(0,0,0,0.25);
        z-index: 2;
        position: relative;
        background: var(--color-light) url('{{asset('storage/app/resume/resume.png')}}') 15% center;
        background-blend-mode:luminosity;
        background-repeat: no-repeat;
    }

    #resume h1 {
        position: absolute;
        left: 45%;
        top: 30%;
        text-transform: uppercase;
        font-weight: 600;
    }

    #resume p {
        position: absolute;
        top: 40%;
        left: 45%;
        text-transform: uppercase;
        font-weight: 400;
        color: var(--color-dark);
    }
    
    #resume a {
        position: absolute;
        bottom: 25%;
        left: 45%;
    }

    @media only screen and (max-width: 768px) {
        #resume {
            min-height: 100vw;
            background: var(--color-light) url('{{asset('storage/app/resume/resume.png')}}') center center;
            background-blend-mode:luminosity;
            background-repeat: no-repeat;
        }

        #resume h1 {
            position: absolute;
            top: 20%;
            margin-left: auto;
            margin-right: auto;
            left: 0;
            right: 0;
            text-align: center;
            font-size: 2rem;
        }

        #resume p {
            position: absolute;
            top: 45%;
            margin-left: auto;
            margin-right: auto;
            left: 0;
            right: 0;
            text-align: center;
        }
        
        #resume a {
            position: absolute;
            margin-left: auto;
            margin-right: auto;
            left: 10%;
            right: 10%;
            text-align: center;
        }
    }

    #contact {
        min-height: 100vh;
    }

    #contact .white-box-auto h1 {
        font-size: 2rem;
        font-weight: 600;
        text-transform: uppercase;
    }

    #contact .part-2 h1 {
        text-transform: uppercase;
        font-size: 2rem;
    }

    #contact .social-row {
        width: 250px;
        margin: auto;
        padding: 10px;
    }

    #contact .social {
        width: 4rem;
        height: 4rem;
        background: var(--color-primary);
        border-radius: 50%;
        color: var(--color-light);
        font-size: 2.5rem;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    #contact .copyright {
        position: absolute;
        left: 0;
        bottom: 0;
        right: 0;
        text-transform: uppercase;
        color: var(--color-primary);
    }

    @media only screen and (max-width: 768px) {
        #contact {
            padding: 1rem 0;
        }
        #contact .white-box-auto {
            margin: 0;
        }
        #contact .row {
            margin: 0 auto;
        }
        #contact .white-box-auto h1 {
            font-size: 1.5rem;
        }
        #contact .part-2 {
            min-height: 50vw;
        }
        .dg-input i, .dg-input input, .dg-input textarea {
            font-size: 10px;
        }

        .dg-input .input-group-text.top {
            margin-top: 0px; 
        } 
    }

    @media only screen and (max-width: 480px) {
        #contact .part-2 {
            min-height: 100vw;
        }
    }

    #blog {
        min-height: 100vh;
        padding: 0;
    }

    #blog .blog-head {
        height: 50vh;
        width: 100%;
    }

    #blog h1 {
        font-size: 2.5rem;
        margin: 1rem 0;
        font-weight: 600;
    }

    #blog #post h1,h2,h3,h4,h5,h6 {
        font-weight: 400;
    }

    #blog #post a {
        color: var(--color-primary);
        font-weight: 600;
    }

    #blog #post a:hover {
        color: var(--color-primary);
    }

    @media only screen and (max-width: 768px) {
        #blog h1 {
            font-size: 1.5rem;
            line-height: 1.4;
        }

        #blog #post h1 {
            font-size: 1.5rem;
            line-height: 1.4;
        }
        #blog #post h2 {
            font-size: 1.3rem;
            line-height: 1.4;
        }
        #blog #post h3 {
            font-size: 1.1rem;
            line-height: 1.4;
        }
        #blog #post h4,h5,h6 {
            font-size: 1rem;
            line-height: 1.4;
        }
    }

</style>