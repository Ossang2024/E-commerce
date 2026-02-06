<x-app-layout>

@section('title', 'LA VIP NOIR')

<div class="landing-container">


    <div class="cards-grid">

        <!-- FLOWER -->
        <a href="/menu?category=flower" class="card card1" >
            <div class="hoverlay">
                <div class="card-title">FLOWER</div>
                <div class="card-btn">VIEW MENU</div>
            </div>
        </a>

        <!-- CARTS -->
        <a href="/menu?category=carts" class="card card2">
            <div class="hoverlay">
                <div class="card-title">CARTS</div>
                <div class="card-btn">VIEW MENU</div>
            </div>
        </a>

        <!-- CONCENTRATES -->
        <a href="/menu?category=concentrates" class="card card3">
            <div class="hoverlay">
                <div class="card-title">CONCENTRATES</div>
                <div class="card-btn">VIEW MENU</div>
            </div>
        </a>

        <!-- PRE-ROLLS -->
        <a href="/menu?category=pre-rolls" class="card card4">
            <div class="hoverlay">
                <div class="card-title">PRE-ROLLS</div>
                <div class="card-btn">VIEW MENU</div>
            </div>
        </a>

        <!-- EDIBLES -->
        <a href="/menu?category=edibles" class="card card5">
            <div class="hoverlay">
                <div class="card-title">EDIBLES</div>
                <div class="card-btn">VIEW MENU</div>
            </div>
        </a>
    </div>

</div>

<style>

    .landing-container {
        padding: 40px 20px;
        text-align: center;
        background: #111;
        color: #fff;
    }

    .landing-title {
        font-size: 32px;
        font-weight: 700;
        margin-bottom: 40px;
    }

    .cards-grid {
        display: grid;
        grid-template-columns: repeat(6, 1fr);
        gap: 25px;
        max-width: 1100px;
        margin: auto;
    }

    .card:nth-child(-n+3) {
        grid-column: span 2;
    }

    .card:nth-child(4),
    .card:nth-child(5) {
        grid-column: span 3;
    }

    .card {
        border-radius: 15px;
        overflow: hidden;
        text-decoration: none;
        color: #fff;
        box-shadow: 0 4px 15px rgba(0,0,0,0.4);
        transition: transform 0.2s, box-shadow 0.2s;
        background-size: cover;
        background-position: center;
    }

    .card .hoverlay{
        background: #1f1f1f5c;
        border-radius: 15px;
        overflow: hidden;
        text-decoration: none;
        color: #fff;
        height: 400px;
        padding: 40px;
        display: flex;
        flex-direction: column;
        justify-content: end;
        /* align-items: center; */
    }

    .card1 {
        background-image: url(https://lavipnoir.com/wp-content/uploads/2025/12/flowerbg.png);
    }

    .card2 {
        background-image: url(https://lavipnoir.com/wp-content/uploads/2025/12/carts.png);
    }

    .card3 {
        background-image: url(https://lavipnoir.com/wp-content/uploads/2025/12/waxshatcategory.png);
    }

    .card4 {
        background-image: url(https://lavipnoir.com/wp-content/uploads/2025/12/prerolls_vi.png);
    }

    .card5 {
        background-image: url(https://lavipnoir.com/wp-content/uploads/2025/12/edibles_graphic.png);
    }

    .card:hover {
        transform: translateY(-6px);
        box-shadow: 0 6px 20px rgba(0,0,0,0.6);
    }

    .card-title {
        font-size: 30px;
        font-weight: 600;
        /* margin-top: 15px; */
        text-align: start
    }

    .card-btn {
        /* margin: 15px auto 20px; */
        padding: 10px 20px;
        background: rgb(245,247,249);
        font-weight: 600;
        width: fit-content;
        transition: background 0.2s;
        color: #111;
        margin-top: 30px;
    }

    .card-btn:hover {
        background: #111;
        color: white
    }




    @media (max-width: 768px) {
        .cards-grid {
            grid-template-columns: 1fr;
        }

        .card:nth-child(-n+3),
        .card:nth-child(4),
        .card:nth-child(5) {
            grid-column: span 1;
            max-height: 200px;
        }

        .card:nth-child(-n+3) .hoverlay {
            max-height: 200px;
        }

        .card:nth-child(4) .hoverlay,
        .card:nth-child(5) .hoverlay {
            max-height: 200px;
        }

        .card-title {
            font-size: 25px;
        }

        .card-btn {
            margin-top: 10px;
        }

    }
</style>

</x-app-layout>