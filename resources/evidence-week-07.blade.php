<!DOCTYPE html>

<html lang="id">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Evidence Week 07 - KursusKu</title>

    <style>

        * {

            margin: 0;

            padding: 0;

            box-sizing: border-box;

        }

        body {

            font-family: Arial, sans-serif;

            background: #f1f6fb;

            color: #243b53;

            padding: 25px;

        }

        .container {

            max-width: 1200px;

            margin: auto;

        }

        .header {

            background: #e5f0f8;

            padding: 30px;

            border-radius: 18px;

            margin-bottom: 20px;

        }

        .label {

            display: inline-block;

            background: #bceee6;

            color: #176b70;

            padding: 8px 15px;

            border-radius: 20px;

            font-size: 13px;

            font-weight: bold;

            margin-bottom: 15px;

        }

        .header h1 {

            font-size: 36px;

            margin-bottom: 12px;

        }

        .header p {

            color: #647d96;

            font-size: 17px;

        }

        .cards {

            display: grid;

            grid-template-columns: repeat(3, minmax(0, 1fr));

            gap: 15px;

        }

        .card {

            background: #ffffff;

            border: 1px solid #dbe8f3;

            border-radius: 15px;

            padding: 18px;

            min-width: 0;

        }

        .card h2 {

            font-size: 19px;

            margin-bottom: 12px;

            overflow-wrap: anywhere;

        }

        .description {

            color: #71869c;

            margin-bottom: 18px;

            font-size: 14px;

        }

        .code {

            background: #142532;

            color: #d9e7f2;

            padding: 15px;

            border-radius: 10px;

            min-height: 300px;

            overflow-x: auto;

        }

        .code-title {

            color: #55d6ff;

            font-size: 13px;

            margin-bottom: 15px;

            border-bottom: 1px solid #354653;

            padding-bottom: 10px;

        }

        pre {

            font-family: Consolas, monospace;

            font-size: 12px;

            line-height: 1.8;

            white-space: pre;

        }

        .blue {

            color: #55d6ff;

        }

        .yellow {

            color: #f7d774;

        }

        .green {

            color: #9de4b0;

        }

        .footer {

            margin-top: 25px;

            color: #71869c;

            font-size: 14px;

        }

        @media (max-width: 850px) {

            .cards {

                grid-template-columns: 1fr;

            }

            .header h1 {

                font-size: 27px;

            }

            body {

                padding: 12px;

            }

        }

    </style>

</head>

<body>

<div class="container">

    <header class="header">

        <span class="label">EVIDENCE WEEK 07</span>

        <h1>Route → Controller → Blade</h1>

        <p>KursusKu Laravel · PTIK</p>

    </header>

    <main class="cards">

        <!-- KOTAK 1 -->

        <section class="card">

            <h2> &lt;/&gt; routes/web.php</h2>

            <p class="description">

                Mengatur alamat halaman.

            </p>

            <div class="code">

                <div class="code-title">web.php</div>

<pre><span class="blue">&lt;?php</span>

<span class="blue">use</span> Illuminate\Support\Facades\Route;

<span class="blue">use</span> App\Http\Controllers\HomeController;

Route::get(

    '/',

    [HomeController::class, 'index']

)-&gt;name('home');

Route::get('/evidence-week-07',

    function () {

        return view(

            'evidence-week-07'

        );

    }

)-&gt;name('evidence.week07');</pre>

            </div>

        </section>

        <!-- KOTAK 2 -->

        <section class="card">

            <h2>♙ HomeController.php</h2>

            <p class="description">

                Mengatur proses halaman.

            </p>

            <div class="code">

                <div class="code-title">HomeController.php</div>

<pre><span class="blue">&lt;?php</span>

<span class="blue">namespace</span>

App\Http\Controllers;

<span class="blue">use</span> Illuminate\View\View;

<span class="blue">class</span> HomeController

    <span class="blue">extends</span> Controller

{

    <span class="green">public function</span>

    index(): View

    {

        <span class="blue">return</span>

            view('home');

    }

}</pre>

            </div>

        </section>

        <!-- KOTAK 3 -->

        <section class="card">

            <h2>▤ home.blade.php</h2>

            <p class="description">

                Menampilkan website.

            </p>

            <div class="code">

                <div class="code-title">evidence-week-07.blade.php</div>

<pre><span class="blue">&lt;!DOCTYPE html&gt;</span>

&lt;html lang="id"&gt;

&lt;head&gt;

    &lt;title&gt;KursusKu&lt;/title&gt;

&lt;/head&gt;

&lt;body&gt;

    &lt;div class="container"&gt;

        &lt;h1&gt;

            Selamat Datang

            di KursusKu

        &lt;/h1&gt;

        &lt;p&gt;

            Temukan kursus

            terbaik untukmu.

        &lt;/p&gt;

    &lt;/div&gt;

&lt;/body&gt;

&lt;/html&gt;</pre>

            </div>

        </section>

    </main>

    <footer class="footer">

        Contoh susunan desain bukti yang akan kita buat.

    </footer>

</div>

</body>

</html>