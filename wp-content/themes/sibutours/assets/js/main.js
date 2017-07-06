;(function($){

  var btnMenu = $('#btn-menu'),
      menu = $('.header__menu');
     
     
    $(window).load(function() {
     
     
       //$('.main').fadeTo(1000, 1);
       if(isBlog())
          $('html').css('overflow','visible');
       



    });
     $('select').select2();

     $(".date").flatpickr({
      minDate: "today",
      onChange: function(selectedDates, dateStr, instance) {
           //$('.filters').find('form').submit();
        },
    });
     $(".time").flatpickr({
       enableTime: true,
       noCalendar: true,

       enableSeconds: false, // disabled by default

       time_24hr: true,
    });
    
     btnMenu.on('click', function(){
          menu.toggle();
         
      });

    menu.find(".menu-item-has-children").hoverIntent({
          over: function() {

                $(this).find(">.sub-menu").slideDown(200 );
              },
          out:  function() {
                
                $(this).find(">.sub-menu").slideUp(200);
              },
          timeout: 200

           });

$(".owl-carousel").owlCarousel({
      animateOut: 'fadeOut',
      items : 1,
      autoplay : true,
      autoplayTimeout: 4000,
      loop : true,
      nav : true,
      navText : ['','']
      /*onChange : function (e) {
        console.log(e.target);
        $('.owl-item.active span').addClass('animated');
        $('.owl-item.active h1').addClass('animated');
      }*/
      /*slideSpeed : 300,
      paginationSpeed : 400,*/
      /*singleItem:true*/
  });

// FUNCTION FOR includes

    var btnIncludes = $('.product-description-accordion-button');
    var IncludesContent = $('.product-description-accordion-content');
    
    IncludesContent.addClass('hidden');

    btnIncludes.on('click', function (e) {
        $(this)
            .next()
            .slideToggle(200);
            /*.siblings('.product-description-accordion-content')
            .slideUp(200);*/

    });
   
   //PAGE FULL
   
   var  $main__menu_containers = $('.main__menu__items');
    var $main__menu__wrapper = $('.main__menu__wrapper');
    var $main__menu__items = $('.main__menu__item');
    var $main__menu__line = $('#chapter-line');

    var menuController = {
        onOpenSlide: function(index) {
            $main__menu__items.removeClass('current');
            $main__menu_containers.each(function() {
                var $this = $(this),
                    item_height = $('.main__menu__item', $this).first().height();
               
                    $this.css('transform', 'translate3d(0,-' + (item_height * index) + 'px,0)');
             
            });
            
            $('body').attr('class',
             function(i, c){
                return c.replace(/(^|\s)fp-viewing-\S+/g, '');
             });
            $('body').addClass('fp-viewing-'+ pfAnchors[index]);

        },
        onOpenDetailSlide: function() {
           
                $main__menu_containers.addClass('main__menu__open');
                $main__menu__line.addClass('main__menu__line-open');
                $main__menu__wrapper.addClass('main__menu__wrapper__open');

          
           
        },
        afterOpenDetailSlide: function() {
            $(".active .slimScrollDiv").focus();
           
                $main__menu_containers.css('z-index', -1);
           
        },
        onCloseDetailSlide: function() {
          
                $main__menu_containers.css('z-index', 1);
                $main__menu_containers.removeClass('main__menu__open');
                $main__menu__line.removeClass('main__menu__line-open');
                $main__menu__wrapper.removeClass('main__menu__wrapper__open');
         
        }
    };
  var isOpen = false;
   function onOpenDetailSlide() {

        isOpen = true;
        $.fn.fullpage.setAllowScrolling(false);
        $.fn.fullpage.setKeyboardScrolling(false);
        menuController.onOpenDetailSlide();
        //animationFrame(function() {
            $('html').css('overflow', 'hidden');
            $(window).trigger('resize');
            //var $active_section = $('.section.fp-section.active');
            //$('.discover-grid li', $active_section).removeClass('animate');
            //_animateGrid();
            var delta = $('.section.fp-section.active .fp-scrollable').scrollTop() || 0;
            set_destination_scrolled(delta);
            $("body").removeClass('transparent-header');
       // });
       // sendPageView();
    }

    function onCloseDetailSlide(index) {
        $.fn.fullpage.setAllowScrolling(true);
        $.fn.fullpage.setKeyboardScrolling(true);
        //animationFrame(function() {
            if (index) {
                $('#section' + index + ' .fp-slide').removeClass('active');
            }
            $('html').css('overflow', 'visible');
            $(window).trigger('resize');

            menuController.onCloseDetailSlide();
            $("body").addClass('transparent-header');
            /*setTimeout(function() {
                animationFrame(function() {
                    $(' li').removeClass('animate');
                });
            }, 200);*/
        //});
        isOpen = false;
        //sendPageView();
    }
     function afterOpenDetailSlide(slide) {
        menuController.afterOpenDetailSlide(slide);
    }
    function afterCloseDetailSlide() {}

    function onOpenSlide(index, prevIndex) {
        if (isOpen) {
            onCloseDetailSlide(prevIndex);
        } else {
            //sendPageView();
        }
        menuController.onOpenSlide(index);
       
    }




   pfAnchors = [];
   $('#fullpage').find('.section').each(function(index, value) { 
    
             pfAnchors.push($(this).data('anchor'));
    });
   //pfAnchors = ['home', 'adventure','cultural','beach-tours'];
    function getPaddingTop() {
        return $(".header").height();
    }

   $('#fullpage').fullpage({
     //scrollBar: true,
     autoScrolling: true,
     verticalCentered: false,
     fitToSection: true,
     //paddingTop: getPaddingTop(),
     scrollOverflow: true,
     loopBottom: true,
     loopHorizontal: false,
     navigation: false,
     anchors: pfAnchors,
     css3: true,
     fixedElements: '#main__link__down, .frog',
    
    afterSlideLoad: function( anchorLink, index, slideAnchor, slideIndex){

            if (slideIndex === 1) {
                afterOpenDetailSlide(this);
            } else {
                afterCloseDetailSlide(this);
            }
            
        },
      onSlideLeave: function( anchorLink, index, slideIndex, direction, nextSlideIndex){
      
            if(slideIndex == 0 && direction == 'right'){
          
                onOpenDetailSlide();

            }
            if(slideIndex == 1){
      
                 onCloseDetailSlide();
              
            }
           
        },

    onLeave: function(index, nextIndex, direction){
      
      onOpenSlide(nextIndex - 1, index - 1);
      
    }

  });

  
   function isSmall() {
        
        return !($('.header__btn-menu').css('display') == 'none');
        
    }
    function isBlog() {
        
        return ($('body').hasClass('single-format-standard') || $('body').hasClass('blog'));
        
    }
   $main__menu__wrapper.on('click', '.main__menu__item', function(e) {
        e.stopPropagation();
     
        if(!isSmall()){

        var chapter = $(this).data('goto');
          if (chapter) {
              $.fn.fullpage.moveTo(chapter);
          } else if (isSmall() || $(this).hasClass('home')) {
              window.location.href = $('a', this).attr('href');
          } else {
              $.fn.fullpage.moveSlideRight();
          }

        }
    });
    $main__menu__wrapper.on('click', '.main__menu__item a', function(e) {
         if(!isSmall())
          e.preventDefault();

    });

    $main__menu__wrapper.on('click', '.fp-controlArrow', function(e) {
        e.stopPropagation();
        
        if ($(this).hasClass('fp-next')) {
            if (isSmall()) {
                window.location.href = $(this).siblings('a').attr('href');
            } else {
               $.fn.fullpage.moveSlideRight();
            }
        } else if ($(this).hasClass('fp-down')) {
            $.fn.fullpage.moveSectionDown();
        }
    });

 
 /*function onOpenSlide(nextIndex, index) {

     $('body').attr('class',
           function(i, c){
              return c.replace(/(^|\s)fp-viewing-\S+/g, '');
           });

       $('body').addClass('fp-viewing-'+ pfAnchors[nextIndex]);


         defaultPx = -48 * nextIndex;
         defaultBigPx = -72 * nextIndex;
       
        $('.main__menu__items').css('transform','translate3d(0px,'+ defaultPx +'px,0px)');
        $('.main__menu__big .main__menu__items').css('transform','translate3d(0px,'+ defaultBigPx +'px,0px)');

 }*/
 
  /*var onSlimScroll = function(cb) {
        return (cb, function() {
            return $(".active .fp-scrollable").scrollTop();
        });
    };*/
 /*var onSlimScroll = function(cb) {
        return $(".active .fp-scrollable").scrollTop();
    };*/
    
   // $('#fullpage').on('slimscrolling', '.fp-scrollable', onSlimScroll(set_destination_scrolled));
   $('#fullpage').on('slimscrolling', '.fp-scrollable', function (e) {

     var delta = $(".active .fp-scrollable").scrollTop();
        if (delta > 10) {
            $('.main__menu__wrapper__open').addClass('main__menu__wrapper__scrolled');
        } else {
            $('.main__menu__wrapper__open').removeClass('main__menu__wrapper__scrolled');
        }
   });

function set_destination_scrolled(delta) {
      console.log(delta);
        var delta = delta || $(".active .fp-scrollable").scrollTop();
        if (delta > 10) {
            $('.main__menu__wrapper__open').addClass('main__menu__wrapper__scrolled');
        } else {
            $('.main__menu__wrapper__open').removeClass('main__menu__wrapper__scrolled');
        }
    }
  

     

    // SMOOTH ANCHOR SCROLLING
    var $root = $('html, body');
    $('a.anchor').click(function(e) {
        var href = $.attr(this, 'href');
        if (typeof($(href)) != 'undefined' && $(href).length > 0) {
            var anchor = '';

            if (href.indexOf("#") != -1) {
                anchor = href.substring(href.lastIndexOf("#"));
            }

            if (anchor.length > 0) {
                console.log($(anchor).offset().top);
                console.log(anchor);
                $root.animate({
                    scrollTop: $(anchor).offset().top
                }, 500, function() {
                    window.location.hash = anchor;
                });
                e.preventDefault();
            }
        }
    });


   // Forms with ajax process
    $('form[data-remote]').on('submit', function(e){
        var form =$(this);
        var method = form.find('input[name="_method"]').val() || 'POST';
        var url = form.prop('action');
        form.find('.loader').show();
        $.ajax({
            type: method,
            url: url,
            data: form.serialize(),
            success: function(){
                var message = form.data('remote-success-message');
                form.find('.loader').hide();
                if(message)
                {

                    $('.response').removeClass('message-error').addClass('message-success').html(message).fadeIn(300).delay(4500).fadeOut(300);
                }
            },
            error:function(){
                form.find('.loader').hide();
                $('.response').removeClass('message-success').addClass('message-error').html('Whoops, looks like something went wrong.').fadeIn(300).delay(4500).fadeOut(300);

            }
        });

        limpiaForm(form);

        e.preventDefault();
    });

    $('input[data-confirm], button[data-confirm]').on('click', function(e){
       var input = $(this);

        input.prop('disabled','disabled');

        if(! confirm(input.data('confirm'))){
            e.preventDefault();
        }
    });

    function limpiaForm(miForm) {

        // recorremos todos los campos que tiene el formulario
        $(":input", miForm).each(function() {
            var type = this.type;
            var tag = this.tagName.toLowerCase();
            //limpiamos los valores de los campos…
            if (type == 'text' || type == 'password'  || type == 'email' || tag == 'textarea')
                this.value = "";
            // excepto de los checkboxes y radios, le quitamos el checked
            // pero su valor no debe ser cambiado
            else if (type == 'checkbox' || type == 'radio')
                this.checked = false;
            // los selects le ponesmos el indice a -
            else if (tag == 'select')
                this.selectedIndex = -1;
        });
    }
      

      $('.transfer-popup-link').magnificPopup({
        type: 'inline',
        midClick: true,
        removalDelay: 500, //delay removal by X to allow out-animation
        callbacks: {
            beforeOpen: function() {

                this.st.mainClass = 'mfp-zoom-out';
                $('body').addClass('mfp-open');
            },
            beforeClose: function() {

               
                $('body').removeClass('mfp-open');
            }

        }

       
    });
  $('.tour-popup-link').magnificPopup({
        type: 'inline',
        midClick: true,
        removalDelay: 500, //delay removal by X to allow out-animation
        callbacks: {
            beforeOpen: function() {

                this.st.mainClass = 'mfp-zoom-out';
                $('body').addClass('mfp-open');
            },
            beforeClose: function() {

               
                $('body').removeClass('mfp-open');
            }

        }

       
    });
   $('.lodging-popup-link').magnificPopup({
        type: 'inline',
        midClick: true,
        removalDelay: 500, //delay removal by X to allow out-animation
        callbacks: {
            beforeOpen: function() {

                this.st.mainClass = 'mfp-zoom-out';
                $('body').addClass('mfp-open');
            },
            beforeClose: function() {

               
                $('body').removeClass('mfp-open');
            }

        }

       
    });
 

  fillSelectTour();

  function fillSelectTour(){
         
        
          $.ajax({
                type: 'GET',
                url: '/api/get_posts/?post_type=product&count=-1',//'/api/get_post/?id='+ post_id +'&post_type=tour',
                
                success: function(data){
                    console.log(data)

                    var items = [];

                var select = $('select[name="tours[]"]').empty();
                $.each(data.posts, function(i,item) {
                  select.append( '<option value="'
                                       + $.trim(item.slug) + '">'
                                       + item.title
                                       + '</option>' ); 


           
                });
          

                //select.prepend('<option value="" selected><span style="color:red;">--</span></option>');
                    
                },
                error:function(){
                    console.log('error cargando los tours')
                }
            });
          
    }

    $('.tour-popup-link').on('click',function (e) {
      
    
      //console.log($(this).data('activitie'))
      //$('#tour-popup').find('select[name="tour[]"] option[value="'+ $(this).attr('data-title') +'"]').attr("selected",true).change();
      $('#tour-popup').find('select[name="tours[]"] option[value="'+ $(this).attr('data-title') +'"]').attr("selected",true).change();
      
      console.log($('#tour-popup').find('select[name="tours[]"] option[value="'+ $(this).attr('data-title') +'"]'))
      

      });

 $('.transfer-popup-link').on('click',function (e) {
      
      
      //console.log($(this).data('activitie'))
      $('#transfer-popup').find('select[name="destination"] option[value="'+ $(this).attr('data-title') +'"]').attr("selected",true).change();


      

      });
      
      

    //$(".chosen-select").chosen();
    
    //SCROLL WINDOW FUNCTIONALITY
    
   /* $(window).scroll(function () {
      console.log('h');
          if ($(this).scrollTop() > 50) {
              $('.header').addClass("header--fixed");
          } else {
              $('.header').removeClass("header--fixed");
          }
      });*/

 var resizeId;
resizes();
$(window).resize(resizes);

 function resizes()
     {
          console.log('disparo resize');
          responsive();

        if(getWindowWidth() > 768){

            
              $('.summary-content').slimScroll({
                 height: $('.product').height() - 50
               });
              
               $('body.page .page-content').slimScroll({
                height: $('.page-media').height() - 50
              });
              $('.slide__category .fp-scrollable').slimScroll({
                 height: getWindowHeight()
               });
              
                // $('.tour-banner').attr('style','background-image: url('+ $('.tour-banner').data("full") +');');

         }else {
           
              /*$('.summary-content').slimScroll({
                 height: '400px'
               });*/
              
              /* $('.page-content').slimScroll({
                height: '400px'
              });*/

              
              //  $('.tour-banner').attr('style','background-image: url('+ $('.tour-banner').data("thumb") +');');
              /*$('.slide__category .fp-scrollable').slimScroll({
                 height: '400px'
               });*/
         }
    }
     function responsive() {
           
                var isResponsive = $('.main').hasClass('fp-responsive');
                if (getWindowWidth() < 1000) {
                    if (!isResponsive) {
                        $.fn.fullpage.setAutoScrolling(false, 'internal');
                        $.fn.fullpage.setFitToSection(false, 'internal');
                        $('.main').addClass('fp-responsive');
                    }
                } else if (isResponsive) {
                     $.fn.fullpage.setAutoScrolling(true, 'internal');
                     $.fn.fullpage.setFitToSection(true, 'internal');
                     $('.main').removeClass('fp-responsive');
                }

                //if (options.responsive) {
                /*var isResponsive = container.hasClass(RESPONSIVE);
                if ($window.width() < options.responsive) {
                    if (!isResponsive) {
                         $.fn.fullpage.setAutoScrolling(false, 'internal');
                         $.fn.fullpage.setFitToSection(false, 'internal');
                        
                        (container.addClass(RESPONSIVE);
                    }
                } else if (isResponsive) {
                     $.fn.fullpage.setAutoScrolling(originals.autoScrolling, 'internal');
                     $.fn.fullpage.setFitToSection(originals.autoScrolling, 'internal');
                   
                    container.removeClass(RESPONSIVE);
                }*/
           /* }*/
            
        }
/*
    $(window).resize(resizes);

    function resizes()
     {
      
      
        if(getWindowWidth() > 900){
         
        
          $('.intro__banner').height($(".intro__featured").height());
          //$('.intro__banner__slide img').height($(".intro__featured").height());
        
        
        }else{
          $('.intro__banner').height('auto');
        } 
          
      

     }*/






})(jQuery);


function getScrollerWidth() {
  var scr = null;
  var inn = null;
  var wNoScroll = 0;
  var wScroll = 0;

  // Outer scrolling div
  scr = document.createElement('div');
  scr.style.position = 'absolute';
  scr.style.top = '-1000px';
  scr.style.left = '-1000px';
  scr.style.width = '100px';
  scr.style.height = '50px';
  // Start with no scrollbar
  scr.style.overflow = 'hidden';

  // Inner content div
  inn = document.createElement('div');
  inn.style.width = '100%';
  inn.style.height = '200px';

  // Put the inner div in the scrolling div
  scr.appendChild(inn);
  // Append the scrolling div to the doc
  document.body.appendChild(scr);

  // Width of the inner div sans scrollbar
  wNoScroll = inn.offsetWidth;
  // Add the scrollbar
  scr.style.overflow = 'auto';
  // Width of the inner div width scrollbar
  wScroll = inn.offsetWidth;

  // Remove the scrolling div from the doc
  document.body.removeChild(
    document.body.lastChild);

  // Pixel width of the scroller
  return (wNoScroll - wScroll);
}

function getWindowHeight() {
  var windowHeight=0;
  if (typeof(window.innerHeight)=='number') {
    windowHeight=window.innerHeight;
  } else {
    if (document.documentElement && document.documentElement.clientHeight) {
      windowHeight = document.documentElement.clientHeight;
    } else {
      if (document.body && document.body.clientHeight) {
        windowHeight=document.body.clientHeight;
      }
    }
  }
  return windowHeight;
}

function getWindowWidth() {
  var windowWidth=0;
  if (typeof(window.innerWidth)=='number') {
    windowWidth=window.innerWidth;
  } else {
    if (document.documentElement && document.documentElement.clientWidth) {
      windowWidth = document.documentElement.clientWidth;
    } else {
      if (document.body && document.body.clientWidth) {
        windowWidth=document.body.clientWidth;
      }
    }
  }
  return windowWidth;
}

