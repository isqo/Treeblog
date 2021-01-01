<div class="modal" id="common1-section-modal" style="min-height: 300px;">
    <a class="modal-overlay" href="#main" aria-label="Close"></a>
    <div class="modal-container" role="document">
        <form method="POST" class="form-horizontal section-mng-form" action="{{ route('createsection') }}">
            @csrf
            <div class="modal-header"><a class="btn btn-clear float-right" href="#main" aria-label="Close"></a>
                <div class="modal-title h5">Section management</div>
            </div>
            <div class="modal-body">
                <div class="content">
                    <ul class="tab tab-block">
                        <li class="tab-item">
                            <a href="javascript:;" for="tab-create-section-from-root" form-method="post"
                               form-action="{{ route('createsection') }}" form-button-name="save"
                               class="active">Create</a>
                        </li>
                    </ul>

                    </br>

                    <div class="tab-create-section-from-root">
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
                                <input class="form-input " name="section_name_for_creation" type="text" id="input-example-1"
                                       placeholder="Name" required maxlength="20">
                            </div>
                        </div>


                        <div class="form-group">
                            <div class="col-3 col-sm-12">
                                <label class="form-label" for="input-example-1">Content title</label>
                            </div>
                            <div class="col-9 col-sm-12">
                                <input class="form-input " name="content_title" type="text" id="input-example-1"
                                       placeholder="Name" required maxlength="200">
                            </div>
                        </div>

                        <input class="form-input horizontal_position" name="horizontal_position" type="hidden"
                               placeholder="Name">
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary section-mng-form-btn">Save</button>
                <a class="btn btn-link" href="#main">Close</a>
            </div>
        </form>
    </div>
</div>