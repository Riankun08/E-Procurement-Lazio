<div class="container" id="testimonial">
  <div class="row">
      <div class="col-md-12">
          <div class="row">
              <div class="col-md-12 text-center">
                  <h1 class="heading-testimonial-h1-cs">Testimonial</h1>
                  <p class="paraf-cs-testimonial-p-cs mb-4">All my customers are very satisfied see their reviews
                  </p>
              </div>
              @foreach ($testimonial as $testi)
              @if($testi->status == "publish")   
              <div class="col-md-4">
                  <div class="card card-cs-testimonial">
                      <div class="card-body">
                          <div class="row">
                              <div class="col-md-6">
                                  <div class="group-profile-testimonial">
                                      <div class="profile-image">
                                          <img src="{{ asset('image-save/image-user/' . @$testi->user->image) }}"
                                              class="img-profile-testimonial">
                                      </div>
                                      <div class="name-profile">
                                          <h5 class="title-name-testimonial">{{ @$testi->name }}</h5>
                                          <p class="paraf-name-testimonial">{{ @$testi->division }}</p>
                                      </div>
                                  </div>
                              </div>
                              <div class="col-md-6">
                                  <div class="date-testimonial">
                                      <p class="text-date-testimonial">{{ @$testi->datePost }}</p>
                                  </div>
                              </div>
                              <div class="col-md-12 text-center">
                                  <img src="{{ asset('image-save/image-testimonial/' . @$testi->image) }}" class="img-fluid mb-3">
                                  <p class="message-testimonial">“{{ @$testi->message }}”</p>
                              </div>
                          </div>
                      </div>
                  </div>
              </div>
              @endif
              @endforeach
          </div>
      </div>
  </div>
</div>