

<style>
    #btn-mas {
        display: none;
        margin: 50px;
        margin-right: 50px;
    }

    .redes a,
    .btn-mas label {
        display: block;
        text-decoration: none;
        width: 65px;
        height: 65px;
        line-height: 65px;
        text-align: center;
        border-radius: 50%;
        box-shadow: 0px 1px 10px rgba(0, 0, 0, 0.4);
        transition: all 500ms ease;
    }

    .redes a {
        margin-bottom: -15px;
        opacity: 0;
        visibility: hidden;
    }

    #btn-mas:checked~.redes a {
        margin-bottom: 10px;
        opacity: 1;
        visibility: visible;
    }

    .btn-mas label {
        cursor: pointer;
        font-size: 23px;
    }

    #btn-mas:checked~.btn-mas label {
        transform: rotate(360deg);
        font-size: 60px;
        margin-left: 350px;
        margin-bottom: 320px;
    }
    </style>
</head>

<body>
    
        <input type="checkbox" id="btn-mas" >
        <div class="redes">
            <a href="#">
            <iframe
    allow="microphone;"
    width="350"
    height="430"
    src="https://console.dialogflow.com/api-client/demo/embedded/7831edb8-6bb4-49e3-8e2c-562a03028254">
</iframe></a>

        </div>
        <div class="btn-mas">
            <label for="btn-mas"><img src="image/DS_bot.png" width="60"></label>
        </div>
    
