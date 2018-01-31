<form id="prayer_request" method="post" class="simthemeco-form" data-form-type="post_submission">
                       <input type="hidden"  name="thank_you_url" value="{{ $Form['thank_you_url'] }}" />
                        <div class="form-row align-items-center">
                            <div class="col-sm-6 form-group" id="form_field_wapper_name">
                               <input type="text" name="name" class="form-control first_name" placeholder="Your Name">
                            </div>
                            <div class="col-sm-6 form-group" id="form_field_wapper_location">
                               <input type="text" name="location" class="form-control location" placeholder="Location">
                            </div>
                            <div class="col-sm-12 form-group" id="form_field_wapper_comments">
                               <textarea name="comments" class="form-control prayer_comment" placeholder="Prayer Request Details"></textarea>
                            </div>
                            <div class="prayer_request_btn">
                                <button type="submit" class="btn btn-primary atanaha_btn">{{ $Form['button_text'] }}</button>
                            </div>
                        </div>
                    </form>
