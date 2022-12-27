(function(){
    $(document).ready(function(){
        
        // THE BARS HAMBURS CLASS HERE
        var forEach=function(t,o,r){if("[object Object]"===Object.prototype.toString.call(t))for(var c in t)Object.prototype.hasOwnProperty.call(t,c)&&o.call(r,t[c],c,t);else for(var e=0,l=t.length;l>e;e++)o.call(r,t[e],e,t)};
        var hamburgers = document.querySelectorAll(".hamburger");
        if (hamburgers.length > 0) {
          forEach(hamburgers, function(hamburger) {
            hamburger.addEventListener("click", function() {
              this.classList.toggle("is-active");
            }, false);
          });
        }


          // TOPHEADER HERE
          $('.right_content').scroll(function(){
            $('.top_head').toggleClass('active_header', $(this).scrollTop() > 60);
        });

// ACTIVE NAVIGATION HERE

        $('.bars').click(function(){
            $('.left_nevbar').toggleClass('active_left_navbar');
        });

        $('.menu_bars').click(function(){
          $('.left_nevbar').removeClass('active_left_navbar');
      });



        // PROFILE BOX HERE
        $('.menu_profile').click(function(){
          $('.menu_profile_area').slideToggle(250);
      });

      $('.profile').click(function(){
        $('.profile_area').slideToggle(250);
    });
      // MENU TOGGLE HERE
      $('.toggle_btn').click(function(){
        if($(this).next('.sub_menu').hasClass('active')){
          $(this).next('.sub_menu').slideToggle(250);
        }else{
          $('.sub_menu').removeClass('active');
          $('.sub_menu').hide(250);
          $(this).next('.sub_menu').show(250);
          $(this).next('.sub_menu').addClass('active');
        }
    });

// INPUT FILE HERE
    $('input#imges').change(function(e){
      let img_url = URL.createObjectURL(e.target.files[0]);
      $('img#input_img').show();
      $('img#input_img').attr('src', img_url);
  });

  // CKEDITOR.replace('contant');
  
  // $('.dropify').dropify();

  

    });
})(jQuery)

function inputFocusAnimation(input) {

  let label = input.parentNode.children[0];

  label.classList.add('label_active')
  input.classList.add('input_active')
}

function inputBlurAnimation(input) {
  let label = input.parentNode.children[0];  
  
  
  if(input.value == ''){
    label.classList.remove('label_active')
  }
  input.classList.remove('input_active')
}

function defaultInputAnimation(){
    const inputs = document.querySelectorAll('.animate_input');

    inputs.forEach(input => {
        input.value?inputFocusAnimation(input):'';
    });
}

//image show after upload in input file
function imageUpload(input,e){
  const image_div = input.parentNode.children[0].children[0];
  const label_div_elements = input.parentNode.children[0].children;
  const [file] = input.files;
  if (file) {
    image_div.src = URL.createObjectURL(file);
    image_div.style.opacity = 1;
    label_div_elements[2].style.opacity = 0;
    label_div_elements[3].style.opacity = 0;
    label_div_elements[4].style.opacity = 0;
  }else{
    image_div.src = '#';
    image_div.style.opacity = 0;
    label_div_elements[2].style.opacity = 1;
    label_div_elements[3].style.opacity = 1;
    label_div_elements[4].style.opacity = 1;
  }
}
function readURL(input) {
  if (input.files && input.files[0]) {
    var reader = new FileReader();

    reader.onload = function(e) {
      $('#blah').attr('src', e.target.result);
    }

    reader.readAsDataURL(input.files[0]);
  }
}
function tConvert (time) {
  // Check correct time format and split into components
  [time] = time.split ('.');
  time = time.toString ().match (/^([01]\d|2[0-3])(:)([0-5]\d)(:[0-5]\d)?$/) || [time];

  if (time.length > 1) { // If time format correct
    time = time.slice (1);  // Remove full string match value
    time[5] = +time[0] < 12 ? 'am' : 'pm'; // Set AM/PM
    time[0] = +time[0] % 12 || 12; // Adjust hours
  }
  return time.join (''); // return adjusted time or original string
}
//submit create form through axios
function submitCreateForm(e, form){
  //alert('hello');
  let grade = document.getElementById('grade');
  let section_id = document.getElementById('section_id');
  let subject_id = document.getElementById('subject_id');
  let day = document.getElementById('day');
  let start_time = document.getElementById('start_time');

  console.dir(form);
  e.preventDefault();
  let formData = {
      class: form.grade.value,
      section_id: form.section_id.value,
      subject_id: form.subject_id.value,
      day: form.day.value,
      start_time: form.start_time.value,
  }
  console.log(formData);
  axios.post('routine/store', formData)
  .then(function (response) {
      let data = response.data;
      let table_body = document.getElementById('table-body');
      console.log(response);
      //remove table rows
      while (table_body.firstChild) {
          table_body.removeChild(table_body.firstChild);
      }
      //update table
      data.forEach(element => {
        let time = tConvert(element.start_time)
        let [hour,minute,sec_prefix] = time.split(':');
        let prefix = sec_prefix.slice(2,4);

          table_body.innerHTML += `<tr class="body-row">
              <td class="body-column text-body-column">${element.class}</td>
              <td class="body-column text-body-column">${element.section.name}</td>
              <td class="body-column text-body-column">${element.subject.name}</td>
              <td class="body-column text-body-column">${element.day}</td>
              <td class="body-column text-body-column">${hour}:${minute} ${prefix}</td>
              <td class="body-column text-body-column"><a href="#">View</a></td>
          </tr>`
      });
  })
  .catch(function (error) {
      console.log(error);
  });
}