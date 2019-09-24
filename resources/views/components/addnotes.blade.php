
    @csrf
        <div class="row">
        <div class="col-lg-12">
            <div class="kt-portlet kt-portlet--last kt-portlet--head-lg kt-portlet--responsive-mobile" id="kt_page_portlet">
                <div class="kt-portlet__head kt-portlet__head--lg hposition">
                    <div class="kt-portlet__head-label">
                        <h3 class="kt-portlet__head-title">Add Notes</h3>
                    </div>
                    <div class="kt-portlet__head-toolbar">
                        <div class="btn-group hcustom-btn">
                            <button class="btn btn-brand" type="submit">
                                <i class="la la-credit_hourseck"></i>
                                <span class="kt-hidden-mobile">Save</span>
                            </button>
                        </div>
                    </div>
                </div>
                <div class="kt-portlet__body">
                        <div class="row">
                            <div class="col-12 col-sm-12 col-xl-12 col-xs-12 col-md-12">
                                <div class="kt-section kt-section--first">
                                    <div class="kt-section__body">
                                        <!-- <h3 class="kt-section__title kt-section__title-lg">Create Notes:</h3> -->
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label >Class Date</label>
                                                <input type="text" class="form-control" required name="class_date" id="date">
                                                    @error('class_date')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>


                                                <div class="form-group">
                                                    <label>Choose Corse</label>
                                                        <div class="input-group">
                                                            <select name="course" class="form-control kt-selectpicker" data-live-search="true" required>
                                                                <option selected>Select any</option>
                                                                @foreach ($course as $item)
                                                                <option value="{{ $item->id }}">{{ $item->name }}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                        @error('email')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror

                                                </div>
                                                <div class="form-group">
                                                        <label for="notes">Image</label>
                                                     <input type="file" name="notes[]" id="notes" multiple max="5">
                                                            @error('image')
                                                                <span class="inavlid-feedback" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                            @enderror
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                    </div>
            </div>

        </div>
    </div>
    </form>


