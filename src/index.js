// import Swiper JS
import Swiper from 'swiper';
import SwiperCore, { Autoplay, Navigation } from 'swiper/core';

SwiperCore.use([Autoplay, Navigation]);

const swiper = new Swiper('#banners', {
    loop: true,
    autoplay: { delay: 5000 },
    navigation: {
        nextEl: ".swiper-button-next",
        prevEl: ".swiper-button-prev",
      }
});

const $hamburguer = document.getElementById("hamburguer");
const $header = document.querySelector("header");

$hamburguer.addEventListener('click', function()
{
    $header.classList.toggle("show")
})

const $ongaku = document.querySelector(".video button")
$ongaku.addEventListener('click', function()
{
    let video = document.querySelector(".video video")
    video.muted = false;
    video.play()
})

document.addEventListener("DOMContentLoaded", function()
{

    fetch('db.json')
    .then(response => response.json())
    .then(function(data)
    {

        let $clientes = document.querySelector("#clients .container")
        $clientes.innerHTML = ""

        let $services = document.querySelector("#services [cards]")
        $services.innerHTML = ""

        let cli = data.clients
        let srv = data.services

        for( var i=0; i < cli.length; i++ )
        {

            let $link = document.createElement("a")
            $link.href = cli[i].link
            $link.title = cli[i].title
            $link.target = "_blank"

            let $img = document.createElement("img")
            $img.src = "img/"+cli[i].image

            $link.appendChild($img)

            $clientes.appendChild($link)

        }


        for( var i=0; i < srv.length; i++ )
        {

            let $card = document.createElement("card")

            let $img = document.createElement("img")
            $img.src = "img/"+srv[i].image

            let $title = document.createElement("h3")
            $title.textContent = srv[i].title 

            let $descr = document.createElement("p")
            $descr.textContent = srv[i].description 

            $card.appendChild($img)
            $card.appendChild($title)
            $card.appendChild($descr)

            $services.appendChild($card)

        }

    });


})