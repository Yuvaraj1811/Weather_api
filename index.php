<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Document</title>

</head>
<style>
.control.is-expanded {
    margin-top: 50px;
}

input.input {
    border: 1px solid darkgray;
    border-radius: 5px;
    padding: 5px 5px 5px 5px;
    font-family: poppins;
}

button.button.is-info {
    background: #252522;
    border: 1px solid darkgray;
    border-radius: 5px;
    padding: 5px 10px 5px 10px;
    color: white;
    font-family: poppins;
}

button.button.is-info:hover {
    background: #ffffff;
    color: #000;

}

article.media {
    /* border: 1px solid darkgray;
    width: fit-content;
    border-radius: 8px; */
    padding: 10px 10px 10px 10px;
    font-family: unset;
    background: #f1f3f4;
}

.box {
    margin-top: 25px;
}

.card {
    position: relative;
    display: flex;
    flex-direction: column;
    min-width: 0;
    word-wrap: break-word;
    background-color: #fff;
    background-clip: border-box;
    border: 1px solid black;
    border-radius: 0.25rem;
    margin-left: auto;
    margin-right: auto;
    margin-top: 20px;
}
img {
    float: right;
    /* display: none; */
}
</style>

<body>

    <form method="POST" action="/weatherapi">
        <div class="container">
            <!-- <div class="col-sm-2"></div>  -->
            <div class="field has-addons">
                <center>
                    <div class="control is-expanded ">
                        <input class="input" name="city" id="city" type="text" placeholder="City Name or Pin Code">
                        <button class="button is-info" id="search_city">
                            Search City
                        </button>
                    </div>
                </center>
                <!-- <div class="control">
                    <button class="button is-info">
                        Add City
                    </button>
                </div> -->
            </div>

        </div>

    </form>

    <section class="section">
        <div class="container">
            <div class="columns">
                <div class="column is-offset-4 is-4">
                    <div class="card" id="card1" style="width: 18rem;">
                        <article class="media">
                        {% if weather=="clear sky"%}
                          
                            <div class="media-left">
                            <figure class="image is-50x50">
                                    <img id="icon" src="http://openweathermap.org/img/w/{{icon}}.png" alt="Image">
                            </figure>
                            Location : {{name}}<br>
                            Country : {{country}}<br>
                            Weather : {{weather}}<br>
                            Longitute : {{longitute }}° E<br>
                            Latitude : {{latitude}}° N<br>
                            <!-- {{weather}} -->
                            Wind Speed : {{wind_speed}}<br>
                            Temperature : {{temperature}}°C<br>
                            Humidity : {{humidity}}°C | °F<br>

                            </div>
                           
                            
                        </article>
                       
                    </div>

                </div>
            </div>
        </div>
    </section>
</body>

</html>

<script>
// $("#icon").hide();
$(document).ready(function(){
  $("#search_city").on("click",function(){
    // $("#icon").show();
    var city=$("#city").val();
    if(city==""){
      alert("Please enter city/country name")

      return false
    }
    else{
      $.ajax({
        url:'/weatherapi',
        type:'POST',
        data:JSON.stringify({"city":city}),
        contentType:"application/json;charset=UTF-8",
        return false
      })
    }
    
    
  })
})
</script>

<!-- <script>
  
 var search_city=document.getElementById("search_city")
 var card =document.getElementById("card1")
 search_city.addEventListener("click",()=>{
  card.style.display="block"


 })

</script> -->
