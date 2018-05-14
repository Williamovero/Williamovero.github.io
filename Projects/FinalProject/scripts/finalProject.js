    // Sidenav
    const sideNav = document.querySelector('.sidenav');
    M.Sidenav.init(sideNav, {});

    // Slider
    const slider = document.querySelector('.slider');
    M.Slider.init(slider, {
      indicators: false,
      height: 500,
      transition: 500,
      interval: 6000
    });

    // Material Boxed
    const mb = document.querySelectorAll('.materialboxed');
    M.Materialbox.init(mb, {});

    // ScrollSpy
    const ss = document.querySelectorAll('.scrollspy');
    M.ScrollSpy.init(ss, {});



getElementByClassName('.switch a').on('click', function (Switch)) {  
  Switch.preventDefault();

  getElementByClassName(this).parent().addClass('active');
  getElementByClassName(this).parent().siblings().removeClass('active');

  target = getElementByClassName(this).attr('href');

  getElementByClassName('.switch-content > div').not(target).hide();
  getElementByClassName(target).fadeIn(600);
  
}