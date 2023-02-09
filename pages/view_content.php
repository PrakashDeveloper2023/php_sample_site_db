<?php 
if(isset($_GET['id'])){
    $data = $master->get_content_details($_GET['id']);
}
if(!isset($data) || (isset($data) && empty($data))){
    echo "<script>location.replace('./?page=404')</script>";
    exit;
}
$data['content'] = stripslashes($data['content']);

/**
 * Generate Table of Contents of the article content
 */

preg_match_all('/<h([1-6])*[^>]*>(.*?)<\/h[1-6]>/si',$data['content'],$matches);

$toc = "<ul class='list-group'>";
$previous = 2;

foreach ($matches[0] as $i => $match){

    $current_heading = $matches[1][$i];
    $text = strip_tags($matches[2][$i]);
    $slug = strtolower(str_replace("--","-",preg_replace('/[^\da-z]/i', '-', $text)));
    $heading_anchor = str_replace($text,'<a class="text-reset text-decoration-none" name="'.$slug.'">'.$text.'</a>',$match);
    $data['content'] = str_replace($match,$heading_anchor,$data['content']);


    if(!($previous <= $current_heading)){
        $toc .= str_repeat('</ul>',($previous - $current_heading));
    }

    if(!($previous >= $current_heading)){
        $toc .=  "<ul>";
    }

    $toc .= '<li class="list-group-item text-truncate"><a class="text-decoration-none fw-bold" href="#'.$slug.'">'.$text.'</a></li>';

    $previous = $current_heading;
}

$toc .= "</ul>";

   
?>
<style>
.list-group ul{

}
</style>
<div class="row">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="card rounded-0 mb-3">
            <div class="card-header rounded-0">
                <div class="d-flex w-100 justify-content-between align-items-center">
                    <div class="card-title col-auto flex-shrink-1 flex-grow-1"><strong>Content View</strong></div>
                    <div class="col-auto">
                        <a class="btn btn-default border rounded-0 btn-sm bg-gradient" href="./"><i class="fa fa-angle-left"></i> Back to List</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-3 col-md-4 col-sm-12 col-xs-12">
                <div class="card rounded-0 mb-3" id="toc-container">
                    <div class="card-header rounded-0">
                        <div class="card-title"><b>Table of Contents</b></div>
                    </div>
                    <div class="card-body rounded-0">
                        <div class="container-fluid">
                            <?= $toc ?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-9 col-md-8 col-sm-12 col-xs-12">
                <div class="card rounded-0 mb-3">
                    <div class="card-body rounded-0">
                        <div class="container-fluid">
                            <h1 class="fw-bolder"><?= $data['title'] ?></h1>
                            <hr>
                            <div>
                            <?= $data['content'] ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>