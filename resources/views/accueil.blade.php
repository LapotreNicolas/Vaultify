<x-layout titre="titre">
    <div class="homeImg">
        <img src="{{asset("images/homeImg.jpg")}}" alt="homeImg">
        <div class="homeTextImg">
            <h1>Vaultify</h1>
            <h2>Héros, Monstres, Trésors, Aventure!</h2>
            <img src="images/ornament1.svg" alt="ornament ">
            <h3>Explorez un monde où les légendes prennent vie, où les dragons règnent en maîtres et où des héros intrépides se dressent contre l'obscurité. Préparez-vous à être transporté dans un univers où l'héritage de chaque dragon résonne à travers les âges</h3>
        </div>
        <a href="#homeContent"><i class='bx bx-down-arrow-alt'></i></a>
    </div>
    <div id="homeContent">
        <div class="container">
            <div class="discoverHistory">
                <h2 class="titleSection">Découvrir les histoires</h2>
                <div class="cards">
                    <div class="card">
                        <div class="titleCard">
                            <img src="{{asset("images/icon.jpg")}}" alt="">
                            <div class="headCard">
                                <h3>Titre de l'histoire</h3>
                                <h4>Par user</h4>
                            </div>
                        </div>
                        <div class="contentCard">
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent nec odio quis risus pellentesque rutrum. Fusce sagittis ante eu quam ullamcorper, at rut</p>
                        </div>
                        <div class="buttonCard">
                            <a href="#">Lire</a>
                        </div>
                    </div>
                    <div class="card">
                        <div class="titleCard">
                            <img src="{{asset("images/icon.jpg")}}" alt="">
                            <div class="headCard">
                                <h3>Titre de l'histoire</h3>
                                <h4>Par user</h4>
                            </div>
                        </div>
                        <div class="contentCard">
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent nec odio quis risus pellentesque rutrum. Fusce sagittis ante eu quam ullamcorper, at rut</p>
                        </div>
                        <div class="buttonCard">
                            <a href="#">Lire</a>
                        </div>
                    </div>
                    <div class="card">
                        <div class="titleCard">
                            <img src="{{asset("images/icon.jpg")}}" alt="">
                            <div class="headCard">
                                <h3>Titre de l'histoire</h3>
                                <h4>Par user</h4>
                            </div>
                        </div>
                        <div class="contentCard">
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent nec odio quis risus pellentesque rutrum. Fusce sagittis ante eu quam ullamcorper, at rut</p>
                        </div>
                        <div class="buttonCard">
                            <a href="#">Lire</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-layout>