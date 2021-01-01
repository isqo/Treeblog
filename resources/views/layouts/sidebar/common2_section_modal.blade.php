<div class="modal" id="common2-section-modal" style="min-height: 300px;">
    <a class="modal-overlay" href="#main" aria-label="Close"></a>
    <div class="modal-container" role="document">
        <div class="modal-header"><a class="btn btn-clear float-right" href="#main" aria-label="Close"></a>
            <div class="modal-title h5">Section management</div>
        </div>
        <div class="modal-body">
            <div class="content">
                <ul class="tab tab-block">
                    <li class="tab-item">
                        <a href="javascript:;" for="tab-update-section" class="active">Update</a>
                    </li>
                    <li class="tab-item">
                        <a href="javascript:;" for="tab-create-section">Create</a>
                    </li>
                    <li class="tab-item">
                        <a href="javascript:;" for="tab-delete-section">Delete</a>
                    </li>
                    <li class="tab-item">
                        <a href="javascript:;" for="tab-move-section">Move</a>
                    </li>
                </ul>

                </br>

                <div class="tab-section-mng tab-update-section">
                    <form method="POST" class="form-horizontal" action="{{ route('section.update') }}">
                        @csrf
                        <input name="section_name" class="section_name" id="section_name" type="hidden">
                        <div class="form-group">
                            <div class="col-3 col-sm-12">
                                <label class="form-label" for="new_section_name">Section Name</label>
                            </div>
                            <div class="col-9 col-sm-12">
                                <input class="form-input new_section_name" name="new_section_name" type="text"
                                       id="new_section_name"
                                       placeholder="Name" required maxlength="20">
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-3 col-sm-12">
                                <label class="form-label" for="content_title">Content title</label>
                            </div>
                            <div class="col-9 col-sm-12">
                                <input class="form-input content_title" name="content_title" type="text"
                                       id="content_title"
                                       placeholder="Name" maxlength="200"
                                >
                            </div>
                        </div>

                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary section-mng-form-btn">Save</button>
                            <a class="btn btn-link" href="#main">Close</a>
                        </div>

                        <input class="form-input horizontal_position" name="horizontal_position" type="hidden"
                               placeholder="Name">
                    </form>
                </div>

                <div class="tab-section-mng tab-create-section">
                    <form method="POST" class="form-horizontal" action="{{ route('createsection') }}">
                        @csrf
                        <div class="form-group">
                            <div class="col-3 col-sm-12">
                                <label class="form-label" for="input-example-1">Section parent</label>
                            </div>
                            <div class="col-9 col-sm-12">
                                <input class="form-input section_parent" name="section_parent" type="text"
                                       readonly>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-3 col-sm-12">
                                <label class="form-label" for="input-example-1">Section type</label>
                            </div>
                            <div class="col-9 col-sm-12">
                                <select id="input-example-3" name="section_type" class="form-select">
                                    <option>Tree</option>
                                    <option>Content</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-3 col-sm-12">
                                <label class="form-label" for="input-example-1">Section Name</label>
                            </div>
                            <div class="col-9 col-sm-12">
                                <input class="form-input" name="section_name_for_creation" type="text"
                                       id="input-example-1"
                                       placeholder="Name" required maxlength="20">
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-3 col-sm-12">
                                <label class="form-label" for="input-example-1">Content title</label>
                            </div>
                            <div class="col-9 col-sm-12">
                                <input class="form-input content_title" name="content_title" type="text"
                                       id="content_title"
                                       placeholder="Name" maxlength="200"
                                >
                            </div>
                        </div>

                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary section-mng-form-btn">Save</button>
                            <a class="btn btn-link" href="#main">Close</a>
                        </div>

                        <input class="form-input horizontal_position" name="horizontal_position" type="hidden"
                               placeholder="Name">
                    </form>
                </div>

                <div class="hide-tab-content tab-section-mng tab-delete-section">
                    <form method="POST" class="form-horizontal" action="{{ route('deletesection') }}">
                        @csrf
                        {{method_field('DELETE')}}
                        <div class="form-group">
                            <div class="col-3 col-sm-12">
                                <label class="form-label" for="input-example-1">Section Name</label>
                            </div>
                            <div class="col-9 col-sm-12">
                                <input class="form-input section-to-delete" name="section_name_for_deletion" type="text"
                                       placeholder="Name" readonly>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary section-mng-form-btn">Save</button>
                            <a class="btn btn-link" href="#main">Close</a>
                        </div>
                    </form>
                </div>

                <div class="hide-tab-content tab-section-mng tab-move-section">
                    <form method="POST" class="form-horizontal" action="{{ route('movesection') }}">
                        @csrf
                        <div class="form-group">

                            <div class="col-3 col-sm-12">
                                <label class="form-label" for="input-example-1">Section Name</label>
                            </div>
                            <div class="col-9 col-sm-12">
                                <input class="form-input section-to-move" name="section_name_for_moving" type="text"
                                       placeholder="Name" readonly>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-3 col-sm-12">
                                <label class="form-label" for="input-example-1">Direction</label>
                            </div>
                            <div class="col-9 col-sm-12">
                                <select id="move-select-box" name="direction" class="form-select">
                                    <option value="1">Up</option>
                                    <option value="2">Down</option>
                                </select>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary section-mng-form-btn">Move</button>
                            <a class="btn btn-link" href="#main">Close</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>