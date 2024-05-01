<div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">
    <div>
        <div class="heading-2">
            <h3 class="title-3 fsz-15 grenadier-color">Change Your Personal Details</h3>
        </div>

        <form action="{{ route('template.one.user.profile.update') }}" method="post">
            @csrf

            <div class="row">

                <div class="col-lg-3">

                    <div class="mb-3">
                        <label for="" class="form-label">User Name <span class="text-danger">*</span></label>
                        <input type="text" name="name" value="{{ $profileData->name }}" id=""
                            class="form-control" placeholder="" aria-describedby="helpId" />
                    </div>

                </div>

                <div class="col-lg-3">
                    <div class="mb-3">
                        <label for="" class="form-label">User Email <span class="text-danger">*</span></label>
                        <input type="email" name="email" value="{{ $profileData->email }}" id=""
                            class="form-control" placeholder="" aria-describedby="helpId" />
                    </div>
                </div>

                <div class="col-lg-3">
                    <div class="mb-3">
                        <label for="" class="form-label">User Phone <span class="text-danger">*</span></label>
                        <input type="text" name="phone" value="{{ $profileData->phone }}" id=""
                            class="form-control" placeholder="" aria-describedby="helpId" />
                    </div>
                </div>


                <div class="col-lg-3">
                    <div class="mb-3">
                        <label for="" class="form-label">Country <span class="text-danger">*</span></label> <br>
                        <input type="text" name="country" value="{{ $profileData->country }}" id=""
                            class="form-control" placeholder="Country" aria-describedby="helpId" />
                    </div>
                </div>

                <div class="col-lg-3">
                    <div class="mb-3">
                        <label for="" class="form-label">City <span class="text-danger">*</span></label> <br>
                        <input type="text" name="city" value="{{ $profileData->city }}" id=""
                            class="form-control" placeholder="City" aria-describedby="helpId" />
                    </div>
                </div>

                <div class="col-lg-3">
                    <div class="mb-3">
                        <label for="" class="form-label">Zip Code <span class="text-danger">*</span></label>
                        <input type="text" name="postal_code" value="{{ $profileData->postal_code }}" id=""
                            class="form-control" placeholder="Zip Code" aria-describedby="helpId" />
                    </div>
                </div>


                <div class="col-lg-3">
                    <div class="mb-3">
                        <label for="" class="form-label">Address 1 <span class="text-danger">*</span></label>
                        <input type="text" name="address" value="{{ $profileData->address }}" id=""
                            class="form-control" placeholder="Address One" aria-describedby="helpId" />
                    </div>
                </div>

                <div class="col-lg-3">
                    <div class="mb-3">
                        <label for="" class="form-label">Address 2 <span class="text-danger">*</span></label>
                        <input type="text" name="address_two" value="{{ $profileData->address_two }}"
                            id="" class="form-control" placeholder="Address Two"
                            aria-describedby="helpId" />
                    </div>
                </div>

            </div>
            <div class="row">
                <div class="col-lg-12">
                    <button style="cursor: pointer" class="grenadier-bg p-2 border-0 text-white px-4">Update
                        Profile</button>
                </div>
            </div>
        </form>
        {{-- Dashboard Links End --}}
    </div>

    {{-- Shipping Address  --}}

    {{-- <div>
        <div class="heading-2 mt-4">
            <h3 class="title-3 fsz-15 grenadier-color">BILLING & Shipping DETAILS</h3>
        </div>
        <form action="" method="post">
            <div class="row">
                <div class="col-lg-12">
                    <div class="row">
                        <div class="col-lg-3">
                            <div class="mb-3">
                                <label for="" class="form-label">User Name <span
                                        class="text-danger">*</span></label>
                                <input type="text" name="" id="" class="form-control"
                                    placeholder="" aria-describedby="helpId" />
                            </div>

                        </div>
                        <div class="col-lg-3">
                            <div class="mb-3">
                                <label for="" class="form-label">User Email <span
                                        class="text-danger">*</span></label>
                                <input type="email" name="" id="" class="form-control"
                                    placeholder="" aria-describedby="helpId" />
                            </div>

                        </div>
                        <div class="col-lg-3">
                            <div class="mb-3">
                                <label for="" class="form-label">User Phone <span
                                        class="text-danger">*</span></label>
                                <input type="text" name="" id="" class="form-control"
                                    placeholder="" aria-describedby="helpId" />
                            </div>

                        </div>
                        <div class="col-lg-3">
                            <div class="mb-3">
                                <label for="" class="form-label">Country <span
                                        class="text-danger">*</span></label> <br>
                                <select name="select" id="select"
                                    class="form-control form-control-sm w-100 py-0 my-0">
                                    <option value="1">Bangladesh</option>
                                    <option value="2">USA</option>
                                    <option value="3">Canada</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="mb-3">
                                <label for="" class="form-label">City <span
                                        class="text-danger">*</span></label> <br>
                                <select name="select" id="select"
                                    class="form-control form-control-sm w-100 py-0 my-0">
                                    <option value="1">Dhaka</option>
                                    <option value="2">Barisal</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="mb-3">
                                <label for="" class="form-label">Zip Code <span
                                        class="text-danger">*</span></label>
                                <input type="text" name="" id="" class="form-control"
                                    placeholder="" aria-describedby="helpId" />
                            </div>

                        </div>
                        <div class="col-lg-3">
                            <div class="mb-3">
                                <label for="" class="form-label">Address 1 <span
                                        class="text-danger">*</span></label>
                                <input type="text" name="" id="" class="form-control"
                                    placeholder="" aria-describedby="helpId" />
                            </div>

                        </div>
                        <div class="col-lg-3">
                            <div class="mb-3">
                                <label for="" class="form-label">Address 2 <span
                                        class="text-danger">*</span></label>
                                <input type="text" name="" id="" class="form-control"
                                    placeholder="" aria-describedby="helpId" />
                            </div>

                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <button style="cursor: pointer" class="grenadier-bg p-2 border-0 text-white px-4">Save</button>
                </div>
            </div>
        </form>
        
    </div> --}}
    
</div>
