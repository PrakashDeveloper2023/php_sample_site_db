<div class="row">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="card rounded-0 mb-3">
            <div class="card-header rounded-0">
                <div class="d-flex w-100 justify-content-between align-items-center">
                    <div class="card-title col-auto flex-shrink-1 flex-grow-1"><strong>List of Contents</strong></div>
                    <div class="col-auto">
                        <button class="btn btn-primary rounded-0 btn-sm bg-gradient" id="add_new_content" type="button"><i class="fa fa-plus-square"></i> Add New</button>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <?php 
            $contents = $master->list_contents();
            if(!empty($contents)):
            foreach($contents as $content):
            ?>
            <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12 mb-3 px-2">
                <div class="card h-100 shadow Content-item rounded-0">
                    <div class="card-header rounded-0">
                        <div class="card-title text-truncate"><?= $content['title'] ?></div>
                    </div>
                    <div class="card-body rounded-0">
                        <div class="lh-1 fw-lighter text-muted fst-italic truncate-3"><?= strip_tags(stripslashes($content['content'])) ?></div>
                        
                    </div>
                    <div class="card-footer rounded-0">
                        <div class="d-flex w-100 align-items-center">
                            <div class="col-auto">
                                <a  href="javascrip:void(0)" data-id="<?= $content['id'] ?>" class="px-2 py-1 edit-content  opacity-75" title="Edit Content">
                                        <i class="fa fa-edit"></i>
                                </a>
                            </div>
                            <div class="col-auto">
                                <a  href="javascrip:void(0)" data-id="<?= $content['id'] ?>" class="px-2 py-1 delete-content opacity-75 text-danger" title="Delete Content">
                                        <i class="fa fa-trash"></i>
                                </a>
                            </div>
                            <div class="col-auto">
                                <a  href="./?page=view_content&id=<?= $content['id'] ?>" class="px-2 py-1 opacity-75 text-dark" title="View Content">
                                        <i class="fa fa-eye"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php endforeach; ?>
            <?php else: ?>
                <div class="text-muted text-center"><small class="fw-light fst-italic">No post Content yet.</small></div>
            <?php endif; ?>
        </div>
    </div>
</div>