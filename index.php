<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Event Horizon</title>
    <link rel="stylesheet" href="CSS/header.css">
    <link rel="stylesheet" href="CSS/landing.css">
</head>

<body>
    <header>
        <div class="header">
            <!-- logo -->
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-10 h-10 text-white p-2 bg-indigo-500 rounded-full" viewBox="0 0 24 24">
                <path d="M12 2L2 7l10 5 10-5-10-5zM2 17l10 5 10-5M2 12l10 5 10-5"></path>
            </svg>
            <span style="margin-left: 10px;">Event Horizon</span>
        </div>
        <div class="registration">
            <button onclick="window.location.href = 'registration/login.php'" class="button">Login</button>
            <button onclick="window.location.href = 'registration/signup.php'" class="button">Sign Up</button>
        </div>
    </header>
    <div class="main-content" id="vid">
        <div id='hue_cancel'>
        <div class="welcome">
            <video autoplay muted loop width="300px" class='text-black'>
                <source src="resources/calendar.gif" type="video/gif">
                <source src="resources/calendar.mp4" type="video/mp4">
                video not showing
            </video>
            <span style="margin-left: 20px;" >
                <span class="ultimate">Ultimate</span><br>
                event management
            </span>
        </div>
        <div class="benefits">
            <div class="benefit">
                <img src="resources/event.svg" width="150px" alt="event">
                
                <span>
                    <h3>Create Events</h3>
                    <p>Organize and manage events effortlessly.</p>
                </span>
            </div>
            <div class="benefit">
                <span>
                    <h3>Create Categories</h3>
                    <p>Group similar/related events together for easy navigation.</p>
                </span>
                <img src="resources/category.svg" width="150px" alt="category">
            </div>
            <div class="benefit">
                <img src="resources/team.svg" width="150px" alt="team">
                <span>
                    <h3>Build a Team</h3>
                    <p>Create and manage teams where admins can organize events for team members.</p>
                </span>
            </div>
        </div>
        </div>
    </div>
    </span>
</body>
<style>
    #vid{
        background-image: url("imgs/leavs.gif");
        filter: hue-rotate(200deg); 
    }
    #hue_cancel{
        filter: hue-rotate(-200deg); 
    }
</style>

</html>