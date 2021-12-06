var thoigianden = function (end, element ) {
  var giay = 1000,
    phut = giay * 60,
    gio = phut * 60,
    ngay = gio * 24,
    end = new Date(end),
    timer,
    caclulate = function () {
      var now = new Date(),
        gioihan = end.getTime() - now.getTime(),
        data;
      if (isNaN(end)) {
        console.log("nhập sai dữ liệu ");
        return;
      }
      if (gioihan <= 0) {
        console.log("quá giới hạn thời gian ");
        clearInterval(timer);
       
      }
      else{
          if(!timer){
              timer=setInterval(caclulate,giay)
          }
      }
      data={
          'ngay':Math.floor(gioihan/ngay),
          'gio':Math.floor((gioihan % ngay)/gio),
          'phut':Math.floor((gioihan % gio)/phut),
          'giay':Math.floor((gioihan % phut)/giay),

      }
      if(element.length){
          for(x in element){
              var x=element[x];
              data[x]=('00'+data[x]).slice(-2);
              document.getElementById(x).innerHTML=data[x];
          }
      }
    };
    caclulate();
};
