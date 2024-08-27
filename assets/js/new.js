$(document).ready(function () {
  $.ajax({
    url: "controller/userController.php",
    type: "POST",
    contentType: "application/json",
    data: JSON.stringify({ action: "campaign" }),
    success: function (data) {
      if (data && data.length > 0) {
        data.forEach(function (campaign) {
          $(".banner").append(`
                        <div class="swiper-slide">
                        <div class="image-layer"
                            style="background-image: url(assets/images/campaign/${campaign.photo});">
                        </div>
                       
                        <div class="main-slider__shape-1">
                            <img src="assets/images/shapes/main-slider-shape-1.png" alt="">
                        </div>
                        <div class="main-slider__shape-2">
                            <img src="assets/images/shapes/main-slider-shape-2.png" alt="">
                        </div>
                        <div class="main-slider__shape-3">
                            <img src="assets/images/shapes/main-slider-shape-3.png" alt="">
                        </div>
                        <div class="container">
                            <div class="row">
                                <div class="col-xl-7 col-lg-8">
                                    <div class="main-slider__content">
                                        <p class="main-slider__sub-title">${campaign.description}</p>
                                        <h2 class="main-slider__title">${campaign.title}</h2>
                                        <div class="main-slider__btn-box">
                                            <a href="registerFund.php" class="thm-btn main-slider__btn">Be a Fundraiser</a>
                                            <a href="volunteer.php" class="main-slider__btn-two">Speak with Expert</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    `);
        });
      } else {
        $(".banner").append("<p>Sorry not able to upload.</p>");
      }
    },
    error: function (xhr, status, error) {
      console.log("hello");
      console.log(xhr);
      console.error("Error fetching data:", error);
      window.location.href="404.php"
    },
  });
});

$(document).ready(function () {
  $.ajax({
    url: "controller/userController.php",
    method: "POST",
    contentType: "application/json",
    data: JSON.stringify({ action: "campaign" }),
    dataType: "json",
    success: function (data) {
    console.log(data);

      if (data && data.length > 0) {
        var carousel = $(".bottom");
        carousel.empty();

        var shuffledData = data.sort(() => 0.5 - Math.random()).slice(0, 9);

        shuffledData.forEach(function (campaign) {
          var percentageRaised = (
            (campaign.raised_amount / campaign.goal_amount) *
            100
          ).toFixed(2);
          var item = `
                         <div class="item ">
                           <a href="campaign_details.php?id=${campaign.id}">
                            <div class="recommended-one__single" style="height: 300px;">
                                <div class="recommended-one__img-box"   style="height: 250px; overflow: hidden;">
                                    <div class="recommended-one__img" >
                                        <img src="assets/images/campaign/${campaign.photo}" alt="" style="width: 100%; height: 100%; object-fit: cover;">
                                    </div>
                                   
                                    <div class="recommended-one__content">
                                        <div class="recommended-one__tag-and-remaining">
                                            <div class="recommended-one-tag">
                                                <p>${campaign.category}</p>
                                            </div>
                                            <div class="recommended-one__remaing">
                                                <div class="icon">
                                                    <i class="fa fa-clock"></i>
                                                </div>
                                                <div class="text">
                                                    <p>20 Days Remaining</p>
                                                </div>
                                            </div>
                                        </div>
                                        <h3 class="recommended-one__title"><a href="campaign_details.php?id=${campaign.id}">${campaign.title}</a></h3>
                                       <a href="campaign_details.php?id=${campaign.id}">
                                        <div class="progress-levels">
                                            <!--Skill Box-->
                                            
                                            <div class="progress-box">
                                                <div class="inner count-box">
                                                    <div class="bar">
                                                        <div class="bar-innner">
                                                            <div class="skill-percent">
                                                                <span class="count-text" data-speed="3000"
                                                                    data-stop="${percentageRaised}">0</span>
                                                                <span class="percent">%</span>
                                                            </div>
                                                            <div class="bar-fill" data-percent="${percentageRaised}"></div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                           
                                        </div>
                                         </a>
                                        <div class="project-one__goals">
                                            <p class="project-one__goals-one"><span>${campaign.raised_amount}</span>
                                                <br>Goal of $${campaign.goal_amount}</p>
                                            <p class="project-one__goals-one"><span class="odometer project-one__plus"
                                                    data-count="12"></span>
                                                <br>Backers We Got</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            </a>
                        </div>
           `;
          carousel.append(item);
          //   console.log("Item appended:", item);
        });
        carousel.owlCarousel("destroy");
        carousel.owlCarousel({
          loop: true,
          autoplay: false,
          margin: 30,
          nav: false,
          dots: true,
          smartSpeed: 500,
          autoplayTimeout: 10000,
          navText: [
            "<span class='fa fa-angle-left'></span>",
            "<span class='fa fa-angle-right'></span>",
          ],
          responsive: {
            0: {
              items: 1,
            },
            768: {
              items: 2,
            },
            992: {
              items: 3,
            },
            1200: {
              items: 3,
            },
          },
        });
      } else {
        $(".project-one__carousel").append("<p>Sorry not able to upload.</p>");
        // console.log("No campaigns found");
      }
    },
    error: function (xhr, status, error) {
      console.error("Error fetching campaigns:", error);
      console.log(xhr.responseText);
        window.location.href="404.php"
    },
  });
});

$(document).ready(function () {
  $.ajax({
    url: "controller/userController.php",
    method: "POST",
    contentType: "application/json",
    data: JSON.stringify({ action: "campaign" }),
    dataType: "json",
    success: function (data) {
      if (data && data.length > 0) {
        var carousel = $(".raise");
        carousel.empty();

        var shuffledData = data.sort(() => 0.5 - Math.random()).slice(0, 9);

        shuffledData.forEach(function (campaign) {
          var percentageRaised = (
            (campaign.raised_amount / campaign.goal_amount) *
            100
          ).toFixed(2);
          var item = `
<div class="item" style="padding-bottom:30px;">
  <a href="campaign_details.php?id=${campaign.id}">
    <div class="project-one__single" style="height: 500px;">
        <div class="project-one__img-box">
          <div class="project-one__img" style="height: 250px; overflow: hidden;">
            <img src="assets/images/campaign/${campaign.photo}" alt="" style="width: 100%; height: 100%; object-fit: cover;">
          </div>
          
            <div class="project-one__content">
               
                    <div class="project-one__tag">
                       <a href="campaign_details.php?id=${campaign.id}"><p>${campaign.category}</p></a>
                    </div>
                
              
                <h3 class="project-one__title"><a href="campaign_details.php?id=${campaign.id}">${campaign.title}</a></h3>
                <div class="progress-levels">
                    <div class="progress-box">
                        <div class="inner count-box">
                            <div class="bar">
                                <div class="bar-inner">
                                    <div class="skill-percent">
                                        <span class="count-text" data-speed="3000" data-stop="${percentageRaised}">${percentageRaised}%</span>
                                    </div>
                                    <div class="bar-fill" data-percent="${percentageRaised}"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="project-one__goals">
                    <p class="project-one__goals-one"><span>$${campaign.raised_amount}</span><br>Goal of $${campaign.goal_amount}</p>
                    <p class="project-one__goals-one"><span class="odometer project-one__plus" data-count="12"></span><br>Backers We Got</p>
                </div>
            </div>
        </div>
    </div>
    </a>
</div>`;
          carousel.append(item);
        });

        carousel.owlCarousel("destroy"); 
        carousel.owlCarousel({
          loop: true,
          autoplay: false,
          margin: 30,
          nav: false,
          dots: true,
          smartSpeed: 500,
          autoplayTimeout: 10000,
          navText: [
            "<span class='fa fa-angle-left'></span>",
            "<span class='fa fa-angle-right'></span>",
          ],
          responsive: {
            0: {
              items: 1,
            },
            768: {
              items: 2,
            },
            992: {
              items: 3,
            },
            1200: {
              items: 3,
            },
          },
        });

        $(".progress-box .bar-fill").each(function () {
          var progressWidth = $(this).attr("data-percent");
          $(this).css("width", progressWidth + "%");
        });

        $(".count-text").each(function () {
          var $this = $(this);
          var countTo = $this.attr("data-stop");
          $({ countNum: $this.text() }).animate(
            {
              countNum: countTo,
            },
            {
              duration: parseInt($this.attr("data-speed")),
              easing: "linear",
              step: function () {
                $this.text(Math.floor(this.countNum) + "%");
              },
              complete: function () {
                $this.text(this.countNum + "%");
              },
            }
          );
        });
      } else {
        $(".project-one__carousel").append("<p>Sorry not able to upload.</p>");
        console.log("No campaigns found");
      }
    },
    error: function (xhr, status, error) {
      console.error("Error fetching campaigns:", error);
      console.log(xhr.responseText);
        window.location.href="404.php"
    },
  });
});

$(document).ready(function () {
  $.ajax({
    url: "controller/userController.php",
    method: "POST",
    contentType: "application/json",
    data: JSON.stringify({ action: "volunteer" }),
    dataType: "json",
    success: function (data) {
      //   console.log(data);

      if (data && data.length > 0) {
        var swiperWrapper = $(".volunteer");
        swiperWrapper.empty();

        var shuffledData = data.sort(() => 0.5 - Math.random());

        shuffledData.forEach(function (volunteer) {
          var item = `
                        <div class="swiper-slide">
                            <div class="testimonial-one__rating">
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                            </div>
                            <p class="testimonial-one__text-1">${volunteer.bio_description}</p>
                            <div class="testimonial-one__client-info">
                                <div class="testimonial-one__client-details">
                                    <div class="testimonial-one__client-img ">
                                        <img style="width:100px;height:100px;" src="assets/images/volunteer/${volunteer.photo}" alt="">
                                    </div>
                                    <div class="testimonial-one__client-content">
                                        <h4>${volunteer.name}</h4>
                                        <p>${volunteer.occupation}</p>
                                    </div>
                                </div>
                                <div class="testimonial-one__quote">
                                    <span class="icon-quotes"></span>
                                </div>
                            </div>
                        </div>`;
          swiperWrapper.append(item);
          //   console.log("Item appended:", item);
        });
      } else {
        $(".swiper-wrapper").append("<p>Sorry not able to upload.</p>");
      }
    },
    error: function (xhr, status, error) {
      console.error("Error fetching testimonials:", error);
      console.log(xhr.responseText);
        window.location.href="404.php"
    },
  });
});

$(document).ready(function () {
  $.ajax({
    url: "controller/userController.php",
    method: "POST",
    contentType: "application/json",
    data: JSON.stringify({ action: "donors" }),
    dataType: "json",
    success: function (data) {
      // console.log(data);

      if (data && data.length > 0) {
        var swiperWrapper = $(".donors");
        swiperWrapper.empty();

        var shuffledData = data.sort(() => 0.5 - Math.random());

        shuffledData.forEach(function (donor) {
          var item = `
                    <div class="item">
                      <div class="testimonial-two__single">
                          <div class="testimonial-two__client-info">
                              <div class="testimonial-two__client-img">
                                  <img src="assets/images/donors/${donor.photo}" alt="">
                              </div>
                              <div class="testimonial-two__client-content">
                                  <h4 class="testimonial-two__client-name">${donor.username}</h4>
                                  <p class="testimonial-two__client-sub-title">${donor.occupation}</p>
                              </div>
                          </div>
                          <p class="testimonial-two__text-2">${donor.description}</p>
                          <div class="testimonial-two__quote">
                              <span class="icon-quotes"></span>
                          </div>
                          <div class="testimonial-two__rating">
                              <i class="fa fa-star"></i>
                              <i class="fa fa-star"></i>
                              <i class="fa fa-star"></i>
                              <i class="fa fa-star"></i>
                              <i class="fa fa-star"></i>
                          </div>
                      </div>
                    </div>`;
          swiperWrapper.append(item);
        });

        swiperWrapper.owlCarousel("destroy");
        swiperWrapper.owlCarousel({
          loop: true,
          autoplay: true,
          margin: 30,
          nav: true,
          dots: false,
          smartSpeed: 500,
          autoplayTimeout: 10000,
          navText: [
            "<span class='icon-right-arrow'></span>",
            "<span class='icon-right-arrow'></span>",
          ],
          responsive: {
            0: {
              items: 1,
            },
            768: {
              items: 2,
            },
            992: {
              items: 2,
            },
            1200: {
              items: 2,
            },
          },
        });
      } else {
        console.log("No donors found.");
      }
    },
    error: function (xhr, status, error) {
      console.error("Error fetching testimonials:", error);
      console.log(xhr.responseText);
        window.location.href="404.php";
    },
  });
});

$(document).ready(function () {
  $.ajax({
    url: "controller/userController.php",
    method: "POST",
    contentType: "application/json",
    data: JSON.stringify({ action: "volunteer" }),
    dataType: "json",
    success: function (data) {
      if (data && data.length > 0) {
        var swiperWrapper = $(".three");
        swiperWrapper.empty();

        var shuffledData = data.sort(() => 0.5 - Math.random());

        for (var i = 0; i < 3; i++) {
          var volunteer = shuffledData[i];
          var item = `
            <div class="col-xl-4 col-lg-4 wow fadeInUp" data-wow-delay="100ms">
              <div class="team-one__single" >
                <div class="team-one__img" style="height:300px; overflow: hidden;">
                  <img src="assets/images/volunteer/${volunteer.photo}" alt="" style=" height: 300px; object-fit: cover;">
                </div>
                <div class="team-one__content">
                  <h3 class="team-one__name"><a href="team.html">${volunteer.name}</a></h3>
                  <p class="team-one__sub-title">${volunteer.occupation}</p>
                  <div class="team-one__social">
                    <a href="#"><i class="fab fa-twitter"></i></a>
                    <a href="#"><i class="fab fa-facebook"></i></a>
                    <a href="#"><i class="fab fa-instagram"></i></a>
                  </div>
                </div>
              </div>
            </div>
          `;
          swiperWrapper.append(item);
        }
      } else {
        console.log("not found");
      }
    },
    error: function (xhr, status, error) {
      console.error("Error fetching testimonials:", error);
      console.log(xhr.responseText);
        window.location.href="404.php";
    },
  });
});



$(document).ready(function () {
  var currentPage = 1;
  var itemsPerPage = 6;
   
  function renderPagination(totalItems, itemsPerPage, currentPage) {
    var totalPages = Math.ceil(totalItems / itemsPerPage);
    var paginationHtml = '';

    for (var i = 1; i <= totalPages; i++) {
      paginationHtml += `<li class=" ${i === currentPage ? 'active' : ''}">
                           <a  href="#">${i}</a>
                         </li>`;
    }

    $(".pagination").html(paginationHtml);
  }
  function displayCampaigns(data) {
    var swiperWrapper = $(".all");
    swiperWrapper.empty();
    var startIndex = (currentPage - 1) * itemsPerPage;
    var endIndex = Math.min(startIndex + itemsPerPage, data.length);

    for (var i = startIndex; i < endIndex; i++) {
      
      var campaign = data[i];
      var percentageRaised = (
        (campaign.raised_amount / campaign.goal_amount) *
        100
      ).toFixed(2);
      var item = `
<div class=" col-md-4" style="margin-bottom:30px;">
<a href="campaign_details.php?id=${campaign.id}">
<div class="project-one__single" style="height: 500px; margin-bottom:50px;">
    <div class="project-one__img-box">
      <div class="project-one__img" style="height: 250px; overflow: hidden;">
        <img src="assets/images/campaign/${campaign.photo}" alt="" style="width: 100%; height: 100%; object-fit: cover;">
      </div>
        
        <div class="project-one__content">
            <div class="project-one__tag-and-remaining">
                <div class="project-one-tag">
                    <p>${campaign.category}</p>
                </div>
            </div>
            <h3 class="project-one__title"><a href="#">${campaign.title}</a></h3>
            <div class="progress-levels">
                <div class="progress-box">
                    <div class="inner count-box">
                        <div class="bar">
                            <div class="bar-inner">
                                <div class="skill-percent">
                                    <span class="count-text" data-speed="3000" data-stop="${percentageRaised}">${percentageRaised}%</span>
                                </div>
                                <div class="bar-fill" data-percent="${percentageRaised}"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="project-one__goals">
                <p class="project-one__goals-one"><span>$${campaign.raised_amount}</span><br>Goal of $${campaign.goal_amount}</p>
                <p class="project-one__goals-one"><span class="odometer project-one__plus" data-count="12"></span><br>Backers We Got</p>
            </div>
        </div>
    </div>
</div>
</a>
</div>`;
swiperWrapper.append(item);
    }
    $(".progress-box .bar-fill").each(function () {
      var progressWidth = $(this).attr("data-percent");
      $(this).css("width", progressWidth + "%");
    });

    $(".count-text").each(function () {
      var $this = $(this);
      var countTo = $this.attr("data-stop");
      $({ countNum: $this.text() }).animate(
        {
          countNum: countTo,
        },
        {
          duration: parseInt($this.attr("data-speed")),
          easing: "linear",
          step: function () {
            $this.text(Math.floor(this.countNum) + "%");
          },
          complete: function () {
            $this.text(this.countNum + "%");
          },
        }
      );
    });
  }
  $.ajax({
    url: "controller/userController.php",
    method: "POST",
    contentType: "application/json",
    data: JSON.stringify({ action: "campaign" }),
    dataType: "json",
    success: function (data) {
      if (data && data.length > 0) {
          
          displayCampaigns(data);
          
          renderPagination(data.length, itemsPerPage, currentPage);
  
          
          $(".pagination").on("click", "a", function (e) {
            e.preventDefault();
            currentPage = parseInt($(this).text());
            displayCampaigns(data);
            renderPagination(data.length, itemsPerPage, currentPage);
        });

      } else {
        $(".all").append("<p>Sorry not able to upload.</p>");
        console.log("No campaigns found");
      }
    },
    error: function (xhr, status, error) {
      console.error("Error fetching campaigns:", error);
      console.log(xhr.responseText);
        window.location.href="404.php";
    },
  });
});







$(document).ready(function () {
  $.ajax({
    url: "controller/userController.php",
    method: "POST",
    contentType: "application/json",
    data: JSON.stringify({ action: "fundraiser" }),
    dataType: "json",
    success: function (data) {
      if (data && data.length > 0) {
        console.log(data);
        var swiperWrapper = $(".fundraiser");
        swiperWrapper.empty();

        data.forEach(function (fundraiser) {
          // Ensure that the correct fields are used
          var item = `
             <div class="col-md-4 pb-5 fundraiser-card" data-fundraiser_id="${fundraiser.fundraiser_id}">
              <div class="card ">
                <img src="assets/images/fundraiser/${fundraiser.profile_picture}" class="card-img-top" alt="Fundraiser Image">
                <div class="card-body">
                  <h5 class="card-title">${fundraiser.username}</h5>
                  <p style="font-weight:bold; color:lightblue;" class="card-text">${fundraiser.email}</p>
                   <p style="font-weight:bold;" class="card-text"><strong style="color:black;">Description:</strong>${fundraiser.description}</p>
                   <p style="font-weight:bold;" class="card-text"><strong style="color:black;">Organization:</strong>${fundraiser.organization_name}</p>

                </div>
              </div>
            </div>
          `;
          swiperWrapper.append(item);
        });
      } else {
        console.log("No fundraisers found");
      }
    },
    error: function (xhr, status, error) {
      console.error("Error fetching fundraisers:", error);
      console.log(xhr.responseText);
        window.location.href="404.php";
    },
  });
});

$(document).ready(function () {
  $(document).on("click", ".fundraiser-card", function () {
    var fundraiserId = $(this).data("fundraiser_id");
    
     console.log(fundraiserId);
    $.ajax({
      url: "controller/userController.php",
      method: "POST",
      contentType: "application/json",
      data: JSON.stringify({ action: "getCampaignsByFundraiser", fundraiser_id: fundraiserId }),
      dataType: "json",
      success: function (data) {
        if (data && data.length > 0) {
          console.log(data);
          var campaignWrapper = $(".campaign");
          campaignWrapper.empty();

          data.forEach(function (campaign) {
            var percentageRaised = (
              (campaign.raised_amount / campaign.goal_amount) *
              100
            ).toFixed(2);
            var item = `
              <div class="item col-md-4 " style="padding-bottom:30px;">
                <a href="campaign_details.php?id=${campaign.id}">
                  <div class="project-one__single" style="height: 500px;">
                    <div class="project-one__img-box">
                      <div class="project-one__img" style="height: 250px; overflow: hidden;">
                        <img src="assets/images/campaign/${campaign.photo}" alt="" style="width: 100%; height: 100%; object-fit: cover;">
                      </div>
                      <div class="recomanded-one__icon">
                        <i class="far fa-heart"></i>
                      </div>
                      <div class="project-one__content">
                        <div class="project-one__tag-and-remaining">
                          <div class="project-one-tag">
                            <a href="campaign_details.php?id=${campaign.id}"><p>${campaign.category}</p></a>
                          </div>
                        </div>
                        <h3 class="project-one__title"><a href="campaign_details.php?id=${campaign.id}">${campaign.title}</a></h3>
                        <div class="progress-levels">
                          <div class="progress-box">
                            <div class="inner count-box">
                              <div class="bar">
                                <div class="bar-inner">
                                  <div class="skill-percent">
                                    <span class="count-text" data-speed="3000" data-stop="${percentageRaised}">${percentageRaised}%</span>
                                  </div>
                                  <div class="bar-fill" data-percent="${percentageRaised}"></div>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="project-one__goals">
                          <p class="project-one__goals-one"><span>$${campaign.raised_amount}</span><br>Goal of $${campaign.goal_amount}</p>
                          <p class="project-one__goals-one"><span class="odometer project-one__plus" data-count="12"></span><br>Backers We Got</p>
                        </div>
                      </div>
                    </div>
                  </div>
                </a>
              </div>
            `;
            campaignWrapper.append(item);
          });

          $(".progress-box .bar-fill").each(function () {
            var progressWidth = $(this).attr("data-percent");
            $(this).css("width", progressWidth + "%");
          });
  
          $(".count-text").each(function () {
            var $this = $(this);
            var countTo = $this.attr("data-stop");
            $({ countNum: $this.text() }).animate(
              {
                countNum: countTo,
              },
              {
                duration: parseInt($this.attr("data-speed")),
                easing: "linear",
                step: function () {
                  $this.text(Math.floor(this.countNum) + "%");
                },
                complete: function () {
                  $this.text(this.countNum + "%");
                },
              }
            );
          });
          $("#fundraiser-cards").hide();
          $("#campaign-details").show();
        } else {
          console.log("No campaigns found for this fundraiser.");
        }
      },
      error: function (xhr, status, error) {
        console.error("Error fetching campaigns:", error);
        console.log(xhr.responseText);
          window.location.href="404.php";
      }
    });
  });
});

function showFundraisers() {
  $("#campaign-details").hide();
  $("#fundraiser-cards").show();
}

$(document).ready(function () {
  
  var currentPage = 1;
  var itemsPerPage = 6;

  
  function renderPagination(totalItems, itemsPerPage, currentPage) {
    var totalPages = Math.ceil(totalItems / itemsPerPage);
    var paginationHtml = '';

    for (var i = 1; i <= totalPages; i++) {
      paginationHtml += `<li class=" ${i === currentPage ? 'active' : ''}">
                           <a  href="#">${i}</a>
                         </li>`;
    }

    $(".pagination").html(paginationHtml);
  }

  // Function to display donors for the current page
  function displayDonors(data) {
    var swiperWrapper = $(".donor");
    swiperWrapper.empty();

    var startIndex = (currentPage - 1) * itemsPerPage;
    var endIndex = Math.min(startIndex + itemsPerPage, data.length);

    for (var i = startIndex; i < endIndex; i++) {
      var donor = data[i];
      var item = `
                    <div class="item col-md-4 pb-5 donors-card" data-donor-id="${donor.id}">
                      <div class="testimonial-two__single">
                          <div class="testimonial-two__client-info">
                              <div class="testimonial-two__client-img">
                                  <img src="assets/images/donors/${donor.photo}" alt="">
                              </div>
                              <div class="testimonial-two__client-content">
                                  <h4 class="testimonial-two__client-name">${donor.username}</h4>
                                  <p class="testimonial-two__client-sub-title">${donor.occupation}</p>
                              </div>
                          </div>
                          <p class="testimonial-two__text-2">${donor.description}</p>
                          <div class="testimonial-two__quote">
                              <span class="icon-quotes"></span>
                          </div>
                          <div class="testimonial-two__rating">
                              <i class="fa fa-star"></i>
                              <i class="fa fa-star"></i>
                              <i class="fa fa-star"></i>
                              <i class="fa fa-star"></i>
                              <i class="fa fa-star"></i>
                          </div>
                      </div>
                    </div>`;
      swiperWrapper.append(item);
    }
  }

  // Initial AJAX call to fetch donors
  $.ajax({
    url: "controller/userController.php",
    method: "POST",
    contentType: "application/json",
    data: JSON.stringify({ action: "donors" }),
    dataType: "json",
    success: function (data) {
      if (data && data.length > 0) {
        // Render the first page of donors
        displayDonors(data);
        // Render pagination controls
        renderPagination(data.length, itemsPerPage, currentPage);

        // Pagination click event
        $(".pagination").on("click", "a", function (e) {
          e.preventDefault();
          currentPage = parseInt($(this).text());
          displayDonors(data);
          renderPagination(data.length, itemsPerPage, currentPage);
        });
      } else {
        console.log("No donors found.");
      }
    },
    error: function (xhr, status, error) {
      console.error("Error fetching testimonials:", error);
      console.log(xhr.responseText);
        window.location.href="404.php";
    },
  });
});



$(document).ready(function () {
  $(document).on("click", ".donors-card", function () {
    var donorId = $(this).data("donor-id");
    console.log(donorId)
    $.ajax({
      url: "controller/userController.php",
      method: "POST",
      contentType: "application/json",
      data: JSON.stringify({ action: "getCampaignsByDonor", donorId: donorId }),
      dataType: "json",
      success: function (data) {
        var campaignsWrapper = $(".campaign");
        campaignsWrapper.empty();
        console.log(data);
        if (data.length > 0) {
          data.forEach(function (campaign) {
            var percentageRaised = (
              (campaign.raised_amount / campaign.goal_amount) *
              100
            ).toFixed(2);
            var item = `
              <div class="item col-md-4" style="padding-bottom:30px;">
                <a href="campaign_details.php?id=${campaign.id}">
                  <div class="project-one__single"style="height: 500px; margin-bottom:50px;">
                    <div class="project-one__img-box">
                      <div class="project-one__img" style="height: 250px; overflow: hidden;">
                        <img src="assets/images/campaign/${campaign.photo}" alt="" style="width: 100%; height: 100%; object-fit: cover;">
                      </div>
                      <div class="recomanded-one__icon">
                        <i class="far fa-heart"></i>
                      </div>
                      <div class="project-one__content">
                        <div class="project-one__tag-and-remaining">
                          <div class="project-one-tag">
                            <a href="campaign_details.php?id=${campaign.id}"><p>${campaign.category}</p></a>
                          </div>
                        </div>
                        <h3 class="project-one__title"><a href="campaign_details.php?id=${campaign.id}">${campaign.title}</a></h3>
                        <div class="progress-levels">
                          <div class="progress-box">
                            <div class="inner count-box">
                              <div class="bar">
                                <div class="bar-inner">
                                  <div class="skill-percent">
                                    <span class="count-text" data-speed="3000" data-stop="${percentageRaised}">${percentageRaised}%</span>
                                  </div>
                                  <div class="bar-fill" data-percent="${percentageRaised}"></div>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="project-one__goals">
                          <p class="project-one__goals-one"><span>$${campaign.raised_amount}</span><br>Goal of $${campaign.goal_amount}</p>
                          <p class="project-one__goals-one"><span class="odometer project-one__plus" data-count="12"></span><br>Backers We Got</p>
                        </div>
                      </div>
                    </div>
                  </div>
                </a>
              </div>
            `;
            campaignsWrapper.append(item);
          });

          $(".progress-box .bar-fill").each(function () {
            var progressWidth = $(this).attr("data-percent");
            $(this).css("width", progressWidth + "%");
          });

          $(".count-text").each(function () {
            var $this = $(this);
            var countTo = $this.attr("data-stop");
            $({ countNum: $this.text() }).animate(
              {
                countNum: countTo,
              },
              {
                duration: parseInt($this.attr("data-speed")),
                easing: "linear",
                step: function () {
                  $this.text(Math.floor(this.countNum) + "%");
                },
                complete: function () {
                  $this.text(this.countNum + "%");
                },
              }
            );
          });

          $(".donor_card").hide();
          $(".line").hide();
          $(".line1").hide();

          $("#campaign-details").show();
        } 
        else {
          console.log("No campaigns found for this donor.");
        }
      },
      error: function (xhr, status, error) {
        console.error("Error fetching campaigns:", error);
        console.log(xhr.responseText);
          window.location.href="404.php";
      }
    });
  });
});

function showDonors() {
  $("#campaign-details").hide();
  $(".donor_card").show();
  $(".line").show();
  $(".line1").show();

}


$(document).ready(function () {
  $.ajax({
    url: "controller/userController.php",
    method: "POST",
    contentType: "application/json",
    data: JSON.stringify({ action: "volunteer" }),
    dataType: "json",
    success: function (data) {
      if (data && data.length > 0) {
        console.log(data);
        var swiperWrapper = $(".four");
        swiperWrapper.empty();

        
        var shuffledData = data.sort(() => 0.5 - Math.random());

        
        var selectedVolunteers = shuffledData.slice(0, 6);

       
        selectedVolunteers.forEach(function (volunteer) {
          console.log(volunteer);
          var item = `
            <div class="col-xl-4 col-lg-4 col-md-4 wow mb-5 pt- fadeInUp" data-wow-delay="100ms">
              <div class="team-one__single">
                <div class="team-one__img">
                  <img src="assets/images/volunteer/${volunteer.photo}" alt="">
                </div>
                <div class="team-one__content">
                  <h3 class="team-one__name"><a href="team.html">${volunteer.name}</a></h3>
                  <p class="team-one__sub-title">${volunteer.occupation}</p>
                  <div class="team-one__social">
                    <a href="#"><i class="fab fa-twitter"></i></a>
                    <a href="#"><i class="fab fa-facebook"></i></a>
                    <a href="#"><i class="fab fa-instagram"></i></a>
                  </div>
                </div>
              </div>
            </div>
          `;
          swiperWrapper.append(item);
        });
      } 
      else {
        console.log("No volunteers found.");
      }
    },
    error: function (xhr, status, error) {
      console.error("Error fetching volunteers:", error);
      console.log(xhr.responseText);
        window.location.href="404.php";
    },
  });
});

