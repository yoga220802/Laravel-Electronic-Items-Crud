<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tugas UAS Pemrograman Web</title>
    <script src="https://unpkg.com/@dotlottie/player-component@2.7.12/dist/dotlottie-player.mjs" type="module"></script>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&display=swap');

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Poppins', sans-serif;
        }

        body {
            min-height: 100vh;
            background: linear-gradient(135deg, #34617d 0%, #4a7a94 100%);
            display: flex;
            align-items: center;
            padding: 2rem;
            overflow-x: hidden;
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 2rem;
            align-items: center;
        }

        .content {
            color: white;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.2);
            animation: fadeInLeft 1s ease-out;
        }

        .title {
            font-size: 2.5rem;
            font-weight: bold;
            margin-bottom: 1rem;
            letter-spacing: 1px;
            opacity: 0;
            animation: fadeInUp 0.8s ease-out 0.2s forwards;
        }

        .name {
            font-size: 3rem;
            font-weight: bold;
            margin-bottom: 0.5rem;
            opacity: 0;
            animation: fadeInUp 0.8s ease-out 0.4s forwards;
            background: linear-gradient(45deg, #ffffff, #f0f0f0);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            text-shadow: none;
        }

        .id {
            font-size: 1.5rem;
            margin-bottom: 1rem;
            opacity: 0;
            animation: fadeInUp 0.8s ease-out 0.6s forwards;
        }

        .subtitle {
            font-size: 1.8rem;
            margin-bottom: 2rem;
            font-style: italic;
            opacity: 0;
            animation: fadeInUp 0.8s ease-out 0.8s forwards;
        }

        .get-started-container {
            position: relative;
            width: 300px;
            height: 300px;
            margin: 0 auto;
            cursor: pointer;
            opacity: 0;
            animation: fadeInUp 0.8s ease-out 1s forwards;
            transition: transform 0.3s ease;
        }

        .get-started-container:hover {
            transform: scale(1.05);
        }

        .get-started-text {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            color: white;
            font-size: 1.2rem;
            font-weight: bold;
            text-align: center;
            transition: all 0.3s ease;
        }

        .get-started-container:hover .get-started-text {
            transform: translate(-50%, -50%) scale(1.1);
            text-shadow: 0 0 10px rgba(255, 255, 255, 0.8);
        }

        .illustration {
            text-align: right;
            animation: fadeInRight 1s ease-out;
        }

        .illustration img {
            max-width: 100%;
            height: auto;
            border-radius: 10px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .illustration img:hover {
            transform: translateY(-5px);
            box-shadow: 0 15px 40px rgba(0, 0, 0, 0.2);
        }

        @keyframes fadeInLeft {
            from {
                opacity: 0;
                transform: translateX(-50px);
            }
            to {
                opacity: 1;
                transform: translateX(0);
            }
        }

        @keyframes fadeInRight {
            from {
                opacity: 0;
                transform: translateX(50px);
            }
            to {
                opacity: 1;
                transform: translateX(0);
            }
        }

        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        @media (max-width: 768px) {
            .container {
                grid-template-columns: 1fr;
                text-align: center;
            }

            .illustration {
                text-align: center;
                order: -1;
            }

            .content, .illustration {
                animation: fadeInUp 1s ease-out;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="content">
            <h1 class="title">TUGAS UAS PEMROGRAMAN WEB</h1>
            <div class="name">Yoga Agustiansyah</div>
            <div class="id">2206050</div>
            <div class="subtitle">Sistem Manajemen Barang Elektronik</div>
            <div class="get-started-container" onclick="navigateToNext()">
                <dotlottie-player 
                    src="https://lottie.host/a477dea5-0bed-4812-b5f5-7b08113ed5c4/MjzZ5xxlQD.lottie" 
                    background="transparent" 
                    speed="1" 
                    style="width: 100%; height: 100%;" 
                    loop 
                    autoplay>
                </dotlottie-player>
                <div class="get-started-text">Get Started</div>
            </div>
        </div>
        <div class="illustration">
            <img src="{{ asset('images/ilustration.png') }}" alt="Welcome Illustration">
        </div>
    </div>

    <script>
        function navigateToNext() {
            setTimeout(() => {
                window.location.href = "{{ route('electronic-items.index') }}";
            }, 100); // Adjust the timeout as needed
        }
    </script>
</body>
</html>

