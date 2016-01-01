$(document).ready(function() {
    $('div.container,#div1,#guide,#about,div#start').hide();
    $('div.container').fadeIn(2000);
    $('#div1').fadeIn(900).animate({bottom:"10px",opacity:0.8},2000, 'swing');
    $('.dropdown-toggle').hoverDelay({
        hoverEvent: function(){
            $('.dropdown-menu').slideDown(800);
            {queue: false}
        }
    });
    $('.dropdown').mouseleave(function() {
        $('.dropdown-menu').slideUp(800);
    });
    $('button#start').click(function() {
        $('div#guide,div#about,div#cont').hide();
        $('div#start').fadeIn(3000);
    });
    $('button#return').click(function() {
        $('div#start').hide();
        $('div#cont').fadeIn(2000);
    })
    
    $("button#Sign").click(function(event){
        event.preventDefault();
        $.ajax({
            type:"POST",
            url:'submit.php',
            data: {"month":$("#month").find('option:selected').val(),"day":$("#day").find('option:selected').val()},
            success:function(data,status){
                if(data.substring(0,4) == 'null')
                    alert("查询的日期出错喽~");
                else
                    alert("当天的感觉可能是" + data.substring(0,6) + "\n" + "当天可能需要穿：" + data.substring(6,data.length));
            },
            error:function(data,status){
                alert("Somewhere Error");
            }
        });
    });
});

function showGuide() {
    $('div#cont,div#about,div#start').hide();
    $('#guide').fadeIn(2000);
}
function showAbout() {
    $('div#cont,div#guide,div#start').hide();
    $('#about').fadeIn(2000);
}
function showMenu() {
    $("div#about,div#start,div#guide").hide();
    $("div#cont").fadeIn(2200);
}