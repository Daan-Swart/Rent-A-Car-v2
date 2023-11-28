<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>deleteCars_confirm</title>
    

    <style>
        /* DELETE_CONFIRM.PHP */

        .main {
            transition: filter 0ms ease-in-out 0ms;
        }

        .confirm-popup {
            position: absolute;
            top: -100%;
            left: 50%;
            transform: translate(-50%, -50%);
            width: 450px;
            padding: 20px;
            background: #fff;
            border-radius: 10px;
            box-shadow: 0px 2px 5px 5px rgba(0, 0, 0, 0.1);
            margin-top: -25px;
            transition: top 0ms ease-in-out 0ms,
                opacity 300ms ease-in-out,
                margin-top 300ms ease-in-out;
        }

        body.active-popup {
            overflow: hidden;
        }

        body.active-popup .main {
            filter: blur(5px);
            background: rgba(0, 0, 0, 0.08);
            transition: filter 0ms ease-in-out 0ms;
        }

        body.active-popup .confirm-popup {
            top: 50%;
            opacity: 1;
            margin-top: 0px;
            transition: top 0ms ease-in-out 0ms,
                opacity 300ms ease-in-out,
                margin-top 300ms ease-in-out;
        }
    </style>
</head>

<body>

    <div class="main">
        <div class="content">
            <h2>This is article title</h2>
            <p><img src="../img/car5.jpg" alt=""></p>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Provident, nam aliquid? Omnis cum eius ab deleniti dolor consequatur minus ratione
                modi voluptas architecto inventore suscipit, in quas deserunt! Harum, odio.</p>
            <p>Iure veniam nesciunt esse, quasi voluptatibus nulla tempore nam expedita repudiandae ut earum aliquid quis quaerat facilis a quod architecto
                totam, ducimus voluptas eum. Qui nisi odio numquam blanditiis consequatur!</p>
            <p>Sit quam accusantium eum ut nihil earum necessitatibus, ullam atque, corporis, ducimus animi! Neque, enim inventore natus veniam beatae,
                illum facilis praesentium quo doloremque quaerat sint consectetur earum veritatis ullam!</p>
            <p>Error harum facilis, quia reprehenderit ratione iusto odit! Asperiores, fugit voluptatum aliquid saepe eos labore nostrum possimus laboriosam
                officiis. Dolores ducimus laudantium cupiditate ipsum quas repudiandae dicta earum commodi expedita?</p>
            <p>Tenetur, a laudantium maiores reiciendis voluptas repellat ex. Illo quas et ad nesciunt dicta voluptas dolorem, mollitia culpa minima error
                doloribus, rem distinctio perferendis, consequatur sapiente recusandae autem officiis reprehenderit.</p>
        </div>
    </div>
    <div class="confirm-popup">
        <h2>Waarschuwing!</h2>
        <p>Weet U zeker dat u <span style="font-weight: 600;">auto</span> wilt verwijderen?</p>
    </div>
        <script>
            window.addEventListener("load", function(){
                console.log('Je kankermoeder');
                document.body.classList.add("active-popup");
            })
        </script>
</body>

</html>