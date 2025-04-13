
            <section class="ftco-section ftco-services">
                <div class="container">
                    <div class="row justify-content-center mb-5 pb-5 mt-5">
                        <div class="col-md-9 text-center heading-section ftco-animate font-italic">
                            <h2 class="mb-2">Մեր կողմից մատուցվող ատամնաբուժական ծառայությունները կապահովեն ձեր գեղեցիկ ժպիտը</h2>
                            <p>A small river named Duden flows by their place and supplies it with the necessary regelialia.</p>
                        </div>
                    </div>
                    <div class="row">
                        <?php foreach ($web_second_part as $service): ?>
                        <div class="col-md-3 d-flex align-self-stretch ftco-animate">
                            <div class="media block-6 services d-block text-center">
                                <div class="icon d-flex justify-content-center align-items-center">
                                    <img src="<?= base_url('/images/site_images1/' . htmlspecialchars($service['image_name'])) ?>"  style="height: 50px; width: 50px; border-radius: 50%">
<!--                                    <span class="flaticon-tooth"></span>-->
                                </div>
                                <div class="media-body p-2 mt-3">
                                    <h3 class="heading"><?= htmlspecialchars($service->name) ?></h3>
                                    <p><?= htmlspecialchars($service->description) ?></p>
                                </div>
                            </div>
                        </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            </section>
<section class="ftco-section ftco-services">
    <div class="bg-secondary py-5">
        <div class="container">
            <h2 class="text-center text-white wow fadeInRight mb-4">Հիմնական ծառայություններ</h2>
            <div class="row justify-content-center">
                <?php foreach ($web_third_part as $service): ?>
                    <div class="col-sm-6 col-md-4 col-lg-3">
                        <div class="service-card text-center bg-light p-4 shadow-sm rounded">
                            <a href="<?= base_url('/web_third_part_services/' . $service['id']); ?>" class="service-link">
                                <div class="image-container">
                                    <img alt="<?= htmlspecialchars($service['name']) ?>"
                                         src="<?= base_url('/images/site_images2/' . htmlspecialchars($service['image_name'])) ?>"
                                         class="service-image">
                                </div>
                                <h3 class="service-title mt-3"><?= htmlspecialchars($service['name']) ?></h3>
                            </a>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>


<section class="map-wrap">
    <div class="container-fluid mt-3">
      <div class="row">
          <div class="col-md-12 col-sm-6">
              <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d4365.996433755122!2d44.99671898985269!3d41.18241383118108!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x404140ffe9cca5a3%3A0xc4ceb5d3313c4759!2sDental%20Clinic%20Mushegh%20Amiraghyan!5e0!3m2!1sru!2sam!4v1737615911096!5m2!1sru!2sam"
                      width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
          </div>
      </div>
    </div>

</section>
    <!-- 🌟 Additional Styling -->
    <style>
        /* Card Container */
        .service-card {
            height: 100%;
            transition: transform 0.3s ease-in-out, box-shadow 0.3s ease-in-out;
        }
        .service-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.15);
        }

        /* Image Styling */
        .image-container {
            overflow: hidden;
            border-radius: 8px;
        }
        .service-image {
            width: 100%;
            height: 160px;
            object-fit: cover;
            border-radius: 8px;
            transition: transform 0.3s ease-in-out;
        }
        .service-card:hover .service-image {
            transform: scale(1.05);
        }

        /* Service Title */
        .service-title {
            font-size: 18px;
            font-weight: bold;
            color: #333;
        }

        /* Service Link */
        .service-link {
            text-decoration: none;
            display: block;
        }
    </style>