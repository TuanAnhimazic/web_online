
    <?php 
        require_once "./mvc/views/client/include/head.php";
    ?>


<body>


    <?php 
        require_once "./mvc/views/client/include/header.php";
    ?>
>
    <?php 
        require_once "./mvc/views/client/cpanel/".$data["folder"]."/".$data["file"].".php";
    ?>



    <?php 
        require_once "./mvc/views/client/include/footer.php";
    ?>

</body>
<script>

    var withScreen = ($(window).width())
    var headerHeight = document.getElementById('header').clientHeight;
    var sliderHeight = document.getElementById('slider').clientHeight;
    var accordianHeight = document.getElementById('accordian').clientHeight;
    var productSaleHieght = document.getElementById('mobi').clientHeight;
    $(document).ready(function(){
        $('#btn-search').click(function(e){
            if(withScreen >768){
                var heighPc = headerHeight + sliderHeight;
                $('html,body').animate({scrollTop: heighPc},500);
            }else{
                var heighPc = headerHeight + sliderHeight + accordianHeight + productSaleHieght -500;
                $('html,body').animate({scrollTop: heighPc},500);
            }
        })
    })
   $(document).on('click','.nextpagesearch',function(e){
            if(withScreen >768){
                var heighPc = headerHeight + sliderHeight;
                $('html,body').animate({scrollTop: heighPc},500);
            }else{
                var heighPc = headerHeight + sliderHeight + accordianHeight + productSaleHieght -500;
                $('html,body').animate({scrollTop: heighPc},500);
            }
    });
    $(document).on('click','.nextpage',function(e){
            if(withScreen >768){
                var heighPc = headerHeight + sliderHeight;
                $('html,body').animate({scrollTop: heighPc},500);
            }else{
                var heighPc = headerHeight + sliderHeight + accordianHeight + productSaleHieght -500;
                $('html,body').animate({scrollTop: heighPc},500);
            }
    });
    $(document).on('click','.allproduct',function(e){
            if(withScreen >768){
                var heighPc = headerHeight + sliderHeight;
                $('html,body').animate({scrollTop: heighPc},500);
            }else{
                var heighPc = headerHeight + sliderHeight + accordianHeight + productSaleHieght -500;
                $('html,body').animate({scrollTop: heighPc},500);
            }
    });
    $(document).on('click','.category',function(e){
            if(withScreen >768){
                var heighPc = headerHeight + sliderHeight;
                $('html,body').animate({scrollTop: heighPc},500);
            }else{
                var heighPc = headerHeight + sliderHeight + accordianHeight + productSaleHieght -500;
                $('html,body').animate({scrollTop: heighPc},500);
            }
    });
</script>
</html>