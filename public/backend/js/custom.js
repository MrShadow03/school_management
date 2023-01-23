(function () {
  $(document).ready(function () {

    // THE BARS HAMBURS CLASS HERE
    var forEach = function (t, o, r) { if ("[object Object]" === Object.prototype.toString.call(t)) for (var c in t) Object.prototype.hasOwnProperty.call(t, c) && o.call(r, t[c], c, t); else for (var e = 0, l = t.length; l > e; e++)o.call(r, t[e], e, t) };
    var hamburgers = document.querySelectorAll(".hamburger");
    if (hamburgers.length > 0) {
      forEach(hamburgers, function (hamburger) {
        hamburger.addEventListener("click", function () {
          this.classList.toggle("is-active");
        }, false);
      });
    }


    // TOPHEADER HERE
    $('.right_content').scroll(function () {
      $('.top_head').toggleClass('active_header', $(this).scrollTop() > 60);
    });

    // ACTIVE NAVIGATION HERE

    $('.bars').click(function () {
      $('.left_nevbar').toggleClass('active_left_navbar');
    });

    $('.menu_bars').click(function () {
      $('.left_nevbar').removeClass('active_left_navbar');
    });



    // PROFILE BOX HERE
    $('.profile').click(function () {
      $('.profile_area').slideToggle(250);
    });

    // MENU TOGGLE HERE
    $('.toggle_btn').click(function () {
      if ($(this).next('.sub_menu').hasClass('active')) {
        $(this).next('.sub_menu').slideToggle(250);
      } else {
        $('.sub_menu').removeClass('active');
        $('.sub_menu').hide(250);
        $(this).next('.sub_menu').show(250);
        $(this).next('.sub_menu').addClass('active');
      }
    });

    // INPUT FILE HERE
    $('input#imges').change(function (e) {
      let img_url = URL.createObjectURL(e.target.files[0]);
      $('img#input_img').show();
      $('img#input_img').attr('src', img_url);
    });

    // CKEDITOR.replace('contant');

    // $('.dropify').dropify();
    let lastClickedItem = null;
    let lastClickedSubitem = null;
    let items = $('.content_sidebar__item');
    let sublists = $('.content_sidebar__sublist');
    let subitems = $('.content_sidebar__subitem');
    items.on("click", function () {
      //if clicked item is already active then hide sublist
      if ($(this).hasClass('content_sidebar__item--active')) {
        //if sublist of this item is clicked dont hide sublist else hide sublist
        if (lastClickedSubitem && lastClickedSubitem.parent().parent().is($(this))) {
          return;
        }
        $(this).removeClass('content_sidebar__item--active');
        let sublist = $(this).find('.content_sidebar__sublist');
        sublist.hide(250);
        return;
      }

      //if sublist of this item is 
      //set last clicked item
      if (lastClickedItem) {
        lastClickedItem.removeClass('content_sidebar__item--active');
      }
      lastClickedItem = $(this);
      // Remove active from every items
      items.removeClass('content_sidebar__item--active');
      // Add active to clicked item
      $(this).addClass('content_sidebar__item--active');
      //show clicked sublist
      let sublist = $(this).find('.content_sidebar__sublist');
      sublist.show(250);

      //hide other sublists
      sublists.each(function () {
        if (!$(this).is(sublist)) {
          $(this).hide(250);
        }
      });
    });
    subitems.on("click", function () {
      //set last clicked subitem
      if (lastClickedSubitem) {
        lastClickedSubitem.removeClass('content_sidebar__subitem--active');
      }
      lastClickedSubitem = $(this);
      // Remove active from every subitems
      subitems.removeClass('content_sidebar__subitem--active');
      // Add active to clicked subitem
      $(this).addClass('content_sidebar__subitem--active');
    });
  });
})(jQuery)

// if (document.querySelectorAll('.content_sidebar__item')) {
//   let lastClickedItem = null;
//   let lastClickedSubitem = null;
//   let items = document.querySelectorAll('.content_sidebar__item');
//   let sublists = document.querySelectorAll('.content_sidebar__sublist');
//   let subitems = document.querySelectorAll('.content_sidebar__subitem');
//   items.forEach(item => {
//     item.addEventListener("click", function () {
//       //set last clicked item
//       if (lastClickedItem) {
//         lastClickedItem.classList.remove('content_sidebar__item--active');
//       }
//       lastClickedItem = this;
//       // Remove active from every items
//       items.forEach(item => {
//         item.classList.remove('content_sidebar__item--active');
//       });

//       // Add active to clicked item
//       this.classList.add('content_sidebar__item--active');

//       // Add display none to every sublists except current
//       sublists.forEach(sublist => {
//         sublist.classList.add('d-none');
//       });

//       // toggle display none from clicked sublist
//       let sublist = this.querySelector('.content_sidebar__sublist');
//       if (sublist.classList.contains('d-none')) {
//         sublist.classList.remove('d-none');
//       } else {
//         sublist.classList.add('d-none');
//       }

//     });
//   });

//   subitems.forEach(subitem => {
//     subitem.addEventListener("click", function () {
//       //set last clicked subitem
//       if (lastClickedSubitem) {
//         lastClickedSubitem.classList.remove('content_sidebar__subitem--active');
//       }
//       lastClickedSubitem = this;
//       // Remove active from every subitems
//       subitems.forEach(subitem => {
//         subitem.classList.remove('content_sidebar__subitem--active');
//       });

//       // Add active to clicked subitem
//       this.classList.add('content_sidebar__subitem--active');
//     });
//   });
// }


if (document.querySelectorAll('.custom_scrollbar')) {
  const custom_scrollbar = document.querySelectorAll('.custom_scrollbar');
  console.log(custom_scrollbar);
  custom_scrollbar.forEach(scrollbar => {
    new SimpleBar(scrollbar);
  });
}

function getAvailableSections(section_id) {
  let promoted_section = document.getElementById('promoted_section_id');
  let table_wrapper = document.getElementById('table-wrapper');
  //get sections with axios
  axios.get(`getSections/${section_id}`)
    .then(function (response) {
      let data = response.data.sections;
      let students = response.data.students;

      console.log(students);

      //first empty the select
      while (promoted_section.firstChild) {
        promoted_section.removeChild(promoted_section.firstChild);
      }
      if (typeof data == 'string') {
        let option = document.createElement('option');
        option.value = '';
        option.innerText = data;
        option.disabled = true;
        option.selected = true;
        promoted_section.appendChild(option);
      } else {
        if (data.length) {
          let optgroup = document.createElement('optgroup');
          optgroup.label = `Class: ${data[0].class}`;
          promoted_section.appendChild(optgroup);
          data.forEach(section => {
            let option = document.createElement('option');
            option.value = section.id;
            option.innerText = section.name;
            optgroup.appendChild(option);
          });
        } else {
          let option = document.createElement('option');
          option.value = '';
          option.innerText = 'No section available';
          option.disabled = true;
          option.selected = true;
          promoted_section.appendChild(option);
        }
      }

      //Load the students inside the table body
      table_wrapper.classList.remove('d-none');

      //if students are not available then show the message
      if (students.length == 0) {
        table_wrapper.innerHTML = `<div class="alert alert-danger text-center">No promotable students are available in this section</div>`;
      } else {
        //if students are available then show them
        //set table wrapper to default
        table_wrapper.innerHTML = `<table class="w-100">
                                    <thead>
                                        <tr class="heading-row">
                                            <th class="heading-column text-title-column">Merit Position</th>
                                            <th class="heading-column text-title-column">Name</th>
                                            <th class="heading-column text-title-column">Total Marks</th>
                                            <th class="heading-column text-title-column">Grade</th>
                                        </tr>
                                    </thead>
                                    <tbody id="table-body">
                                        <tr class="body-row">
                                        </tr>
                                    </tbody>
                                  </table>
                                  <p class="form_subtitle text-warning pt-1"><i class="fa-solid fa-info-circle"></i> Failed Students Will not be promoted automatically.</p>`;
        //get the table body
        let table_body = document.getElementById('table-body');

        //if there is any child remove it
        while (table_body && table_body.firstChild) {
          table_body.removeChild(table_body.firstChild);
        }

        let i = 1;
        students.forEach(result => {
          let style = result.grade == 'F' ? 'alert alert-danger' : 'alert alert-success';
          table_body.innerHTML += `<tr class="body-row ${style}">
                                    <td class="body-column text-body-column">${i}</td>
                                    <td class="body-column text-body-column">${result.student.name}</td>
                                    <td class="body-column text-body-column">${result.total}</td>
                                    <td class="body-column text-body-column">${result.grade}</td>
                                  </tr>`;
          i++;
        });
      }
    })
    .catch(function (error) {
      console.log(error);
    })
}

function inputFocusAnimation(input) {

  let label = input.parentNode.children[0];

  label.classList.add('label_active')
  input.classList.add('input_active')
}

function inputBlurAnimation(input) {
  let label = input.parentNode.children[0];


  if (input.value == '') {
    label.classList.remove('label_active')
  }
  input.classList.remove('input_active')
}

function defaultInputAnimation() {
  const inputs = document.querySelectorAll('.animate_input');

  inputs.forEach(input => {
    input.value ? inputFocusAnimation(input) : '';
  });
}

//image show after upload in input file
function imageUpload(input, e) {
  const image_div = input.parentNode.children[0].children[0];
  const label_div_elements = input.parentNode.children[0].children;
  const [file] = input.files;
  if (file) {
    image_div.src = URL.createObjectURL(file);
    image_div.style.opacity = 1;
    label_div_elements[2].style.opacity = 0;
    label_div_elements[3].style.opacity = 0;
    label_div_elements[4].style.opacity = 0;
  } else {
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

    reader.onload = function (e) {
      $('#blah').attr('src', e.target.result);
    }
    reader.readAsDataURL(input.files[0]);
  }
}
function tConvert(time) {
  // Check correct time format and split into components
  [time] = time.split('.');
  time = time.toString().match(/^([01]\d|2[0-3])(:)([0-5]\d)(:[0-5]\d)?$/) || [time];

  if (time.length > 1) { // If time format correct
    time = time.slice(1);  // Remove full string match value
    time[5] = +time[0] < 12 ? 'am' : 'pm'; // Set AM/PM
    time[0] = +time[0] % 12 || 12; // Adjust hours
  }
  return time.join(''); // return adjusted time or original string
}
//submit create form through axios
function submitCreateForm(e, form) {
  //alert('hello');
  let grade = document.getElementById('grade');
  let section_id = document.getElementById('section_id');
  let subject_id = document.getElementById('subject_id');
  let day = document.getElementById('day');
  let start_time = document.getElementById('start_time');

  e.preventDefault();
  let formData = {
    class: form.grade.value,
    section_id: form.section_id.value,
    subject_id: form.subject_id.value,
    day: form.day.value,
    start_time: form.start_time.value,
  }

  axios.post('routine/store', formData)
    .then(function (response) {
      // remove previous error messages
      hideErrorDivs();
      // get data
      let data = response.data.data;
      console.log(data);
      let table_body = document.getElementById('table-body');
      //remove table rows
      while (table_body.firstChild) {
        table_body.removeChild(table_body.firstChild);
      }
      //update table
      data.forEach(element => {
        let time = tConvert(element.start_time)
        let [hour, minute, sec_prefix] = time.split(':');
        let prefix = sec_prefix.slice(2, 4);

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
      let errors = error.response.data.errors;
      hideErrorDivs();

      for (let key in errors) {
        let error_div = document.getElementById(key + '_error');
        error_div.innerHTML = errors[key][0];
        error_div.classList.remove('d-none');
      }
    });
}

function hideErrorDivs() {
  document.querySelectorAll('.input_error').forEach(element => {
    element.innerHTML = '';
    element.classList.add('d-none');
  });
}