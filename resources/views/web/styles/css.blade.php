@php 
    use App\Models\Auth\User;
    use App\Models\System\Configuration;

    $user = User::first();
@endphp
<style>
    @import url('https://fonts.googleapis.com/css?family=Montserrat:200,300,400,600,900&display=swap');

    :root {
        --color-primary : #16464D;
        --color-primary-a-5 : #16464DBF;
        --color-dark : #1a1a1a;
        --color-gray: #f2f2f2;
        --color-light: #fefefe;
        --font-family : 'Montserrat', sans-serif;
    }

    html {
        scroll-behavior: smooth;
    }

    body {
        margin: 0;
        padding: 0;
        font-family: var(--font-family);
        line-height: 1;
        color: var(--color-dark);
    }

    .font-lighter { font-weight: 200; } .font-light { font-weight: 300; } .font-medium { font-weight: 600; } .font-bold { font-weight: 900; }
    .bg-gray {background-color: var(--color-gray);}
    .bg-light {background-color: var(--color-light);}
    .bg-main {background-color: var(--color-primary);}
    .primary {color: var(--color-primary);}

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
    }
    #nav ul li a {
        color: var(--color-light);
        text-decoration: none;
    }

    #nav ul li.active {
        border-bottom: var(--color-gray) 4px solid;
    }

    #nav .navbar {
        margin: auto;
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
        background: var(--color-gray) url('{{asset('storage/app/patterns/bg-1.png')}}') center center;
        background-size: cover;
        background-blend-mode: color-dodge;
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

</style>