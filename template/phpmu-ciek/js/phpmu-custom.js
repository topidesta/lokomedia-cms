function nospaces(t){
  if(t.value.match(/\s/g)){
      alert('Maaf, Tidak Boleh Menggunakan Spasi,..');
      t.value=t.value.replace(/\s/g,'');
  }
}

$(document).ready(function(){
	$(window).scroll(function () {
      if ($(this).scrollTop() > 50) {
          $('#back-to-top').fadeIn();
      }else{
          $('#back-to-top').fadeOut();
      }
  });
  // scroll body to 0px on click
  $('#back-to-top').click(function () {
      $('#back-to-top').tooltip('hide');
      $('body,html').animate({
          scrollTop: 0
      }, 800);
      return false;
  });
  $('#back-to-top').tooltip('show');
});

(function($)
 {
   var methods = 
     {
       init : function( options ) 
       {
         return this.each(function()
           {
             var _this=$(this);
                 _this.data('marquee',options);
             var _li=$('>li',_this);
                 
                 _this.wrap('<div class="slide_container"></div>')
                      .height(_this.height())
                     .hover(function(){if($(this).data('marquee').stop){$(this).stop(true,false);}},
                            function(){if($(this).data('marquee').stop){$(this).marquee('slide');}})
                      .parent()
                      .css({position:'relative',overflow:'hidden','height':$('>li',_this).height()})
                      .find('>ul')
                      .css({width:screen.width*2,position:'absolute'});
         
                 for(var i=0;i<Math.ceil((screen.width*3)/_this.width());++i)
                 {
                   _this.append(_li.clone());
                 } 
           
             _this.marquee('slide');});
       },
    
       slide:function()
       {
         var $this=this;
         $this.animate({'left':$('>li',$this).width()*-1},
                       $this.data('marquee').duration,
                       'swing',
                       function()
                       {
                         $this.css('left',0).append($('>li:first',$this));
                         $this.delay($this.data('marquee').delay).marquee('slide');
           
                       }
                      );
                           
       }
     };
 
   $.fn.marquee = function(m) 
   {
     var settings={
                   'delay':4000,
                   'duration':2000,
                   'stop':false
                  };
     
     if(typeof m === 'object' || ! m)
     {
       if(m){ 
       $.extend( settings, m );
     }

       return methods.init.apply( this, [settings] );
     }
     else
     {
       return methods[m].apply( this);
     }
   };
 }
)( jQuery );


jQuery(document).ready(
 function(){jQuery('.breaking-news ul').marquee({delay:3000});}
);

      $(document).ready(function() {
        var $lightbox = $('#lightbox');
        
        $('[data-target="#lightbox"]').on('click', function(event) {
            var $img = $(this).find('img'), 
                src = $img.attr('src'),
                alt = $img.attr('alt'),
                css = {
                    'maxWidth': $(window).width() - 100,
                    'maxHeight': $(window).height() - 100
                };
            $lightbox.find('.close').addClass('hidden');
            $lightbox.find('img').attr('src', src);
            $lightbox.find('img').attr('alt', alt);
            $lightbox.find('img').css(css);
        });
        
        $lightbox.on('shown.bs.modal', function (e) {
            var $img = $lightbox.find('img');
            $lightbox.find('.modal-dialog').css({'width': $img.width()});
            $lightbox.find('.close').removeClass('hidden');
        });
      });

      function jam(){
        var waktu = new Date();
        var jam = waktu.getHours();
        var menit = waktu.getMinutes();
        var detik = waktu.getSeconds();
         
        if (jam < 10){ jam = "0" + jam; }
        if (menit < 10){ menit = "0" + menit; }
        if (detik < 10){ detik = "0" + detik; }
        var jam_div = document.getElementById('jam');
        jam_div.innerHTML = jam + ":" + menit + ":" + detik;
        setTimeout("jam()", 1000);
      } jam();

      