<?php 
function writer_settings(){?>
<script>
    var pageD = <?php $screen = get_current_screen();$pID =substr(strrchr($screen->id,"_"),1);echo $pID;?>;
    var defer = !0;/*,
        mainsrc = <?php echo '"'+plugins_url( '/js/comixngn.min.js', __FILE__ )+'"';?>,
        loadng = ["http://comixngn.js.org/ghs/1.1.1/plugins/comixngn.jq.js","http://code.jquery.com/jquery-2.1.4.min.js", "https://cdnjs.cloudflare.com/ajax/libs/jszip/2.5.0/jszip.min.js"],
        aftjq = ["http://code.jquery.com/ui/1.11.4/jquery-ui.min.js", "https://cdnjs.cloudflare.com/ajax/libs/spectrum/1.7.0/spectrum.min.js"],
        fuse = {fstrun: false, pgepsh: false, pgesve: false, rtepge: false, protect: false, noverwrite: false, arrow: true, addme: false, embed: true},
        plugin = "",
        disable = ["rollbar"],
        comicID="CNGwriter",
        dir = "",
        tir = "",
        $GPC = $GPC + 1 || 1;
        /*cG={agent:function(e,t){return t=new XMLHttpRequest,t.open("GET",e),e=[],t.onreadystatechange=t.then=function(n,s,a){if(n&&n.call&&(e=[,n,s]),4==t.readyState&&(a=e[0|t.status/200]))try{a(JSON.parse(t.responseText),t)}catch(c){a(t.responseText,t)}},t.send(),t},REPO:{scReq:{address: "http://comixngn.js.org/"}},dis:{}};*/
</script>
<style>.glyphicon,.icon{cursor:pointer}#nav-toolbar li{list-style-type:none;display:inline}.tile{margin-left:10px;margin-top:10px}.modify{-webkit-box-shadow:0 0 10px 10px rgba(72,53,212,1);-moz-box-shadow:0 0 10px 10px rgba(72,53,212,1);box-shadow:0 0 10px 10px rgba(72,53,212,1)}
</style>
<script type="text/javascript" src="http://code.jquery.com/ui/1.11.4/jquery-ui.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/spectrum/1.7.0/spectrum.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jszip/2.5.0/jszip.min.js"></script>
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/spectrum/1.6.1/spectrum.min.css">
<link rel="stylesheet" type="text/css" href="https://bootswatch.com/simplex/bootstrap.min.css" />
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/humane-js/3.2.2/themes/flatty.min.css" />
<div class="wrap">
<h2 id="$COMICNGWRITER$$$">Writer</h2>
            <div id="nav-toolbar" style="border: 2px groove; position: fixed; left: 50%; z-index: 9;">
                <ul style="padding: 0px; margin: 0px; top: 50%;">
                    <li>
                        <span id="nav-move" class="button glyphicon glyphicon-move" aria-hidden="true" style="z-index:999;"></span>
                    </li>
                    <!--<li><button id="nav-undo"><span class="glyphicon glyphicon-arrow-left" aria-hidden="true" style="z-index:999;"></span></button></li>
            <li><button id="nav-redo"><span class="glyphicon glyphicon-arrow-right" aria-hidden="true" style="z-index:999;"></span></button></li>-->
                    <li>
                        <!--<select id="nav-select" data-mini="true" data-inline="true">
                    <option value="list">List</option>
                    <option value="thum">Thumbnail</option>
                </select>-->
                    </li>
                    <li>
                        <span id="_set" class="button">* Settings</span>
                    </li>
                    <li>
                        <span id="ExBtnCL" title="Save Settings" class="button">Export</span>
                    </li>
                    <li><span id=MHEADCL></span>
                    </li>
                    <li>
                        <span id="_des" class="button">* Design</span>
                    </li>
                </ul>
            </div>
<div id="accordion">
    <h3 class="button" role="button">* Settings</h3>
    <div id="settings_contain">
        <form method="post" action="options.php">
            <?php settings_fields("writer-group"); ?>
            <?php do_settings_sections( "writer-group" );?>
            <table class="form-table" id="bodtab" border="0" style="width:100%">
                <tr>
                    <td><input id="data" style="visibility:hidden;position:absolute" type="text" name="data_<?php $screen = get_current_screen();$pID =substr(strrchr($screen->id,"_"),1);echo $pID;?>" value="<?= get_option("data_$pID"); ?>" pid="<?="data_$pID"?>"/>
                        <h4 id="confhead" title="Click to toggle border">Configuration</h4>
                    </td>
                    <td title="Script name">
                        <input name="nam" value="Default" type="text">
                    </td>
                </tr>
                <tr> 
                    <td title="Image directory">
                        <label for="dir">Directory</label>
                        <input name="dir" value="assets/" id="dir" type="text">
                    </td>
                    <td title="Select this if you want to continue from a previous configuration.">
                        <label for="historian">Config File</label>
                        <input id="historian" type="file" accept=".json" style="display: inline;">
                    </td>
                </tr>
                <tr>
                    <td>
                        <label for="psn_0">Page Start</label>
                        <input type="radio" id="psn_0" name="psb" checked>0&nbsp;
                        <input type="radio" id="psn_1" name="psb">1</td>
                    <td>
                        <label for="csn_0">Chapter Start</label>
                        <input type="radio" id="csn_0" name="csb" checked>0&nbsp;
                        <input type="radio" id="csn_1" name="csb">1</td>
                </tr>
                <tr>
                    <td title="How far behind images are preloaded">
                        <label for="prb">Pre-Buffer</label>
                        <input type="number" name="prb" value=5 id="prb" min="1" max="100">
                    </td>
                    <td title="How far ahead images are preloaded">
                        <label for="ptb">Post-Buffer</label>
                        <input type="number" name="ptb" value=5 id="ptb" min="1" max="100">
                    </td>
                </tr>
                <?php if($pID != '-1')
                echo '<tr>
                    <td title="An additive json is a file that allows pages to be added by url alone">
                        <label for="add_">Additive pages</label>
                        <input name="add_" value="" id="add_" type="text">
                        <!--<input type="radio" id="add_0" name="aad" checked>Disabled&nbsp;
                <input type="radio" id="add_1" name="aad">Enabled</td>-->
                        <td title="Merge these additive into pages of the script">
                            <label for="mergeadd">Additive Merge</label>
                            <input id="mergeadd" type="file" accept=".json" style="display: inline;">
                        </td>
                </tr>';
                ?>
                <tr>
                    <td style="vertical-align:top" title="If there are more images in the directory than in +the configuration file, attempt to automatically add them">
                        <label for="pyr_0">Append on Page Mismatch</label>
                        <input type="radio" id="pyr_0" name="pyrt" checked>On&nbsp;
                        <input type="radio" id="pyr_1" name="pyrt">Off</td>
                    <td rowspan="2" style="vertical-align:top" title="The order in which the images should be appended">
                        <label for="spyr_0">Append Order</label>
                        <input type="radio" id="spyr_0" name="spyrt" checked>Modified&nbsp;
                        <input type="radio" id="spyr_1" name="spyrt">Name&nbsp;
                        <input type="radio" id="spyr_2" name="spyrt">Size&nbsp;
                        <input type="radio" id="spyr_3" name="spyrt">Type&nbsp;
                        <br>
                        <input type="radio" id="spyro_0" name="spyrto" checked>Descending&nbsp;
                        <input type="radio" id="spyro_1" name="spyrto">Ascending</td>
                </tr>
                <tr>
                    <td title="The page that the comic loads first, either start from the beginning or the most recent">
                        <label for="strp">Start Page</label>
                        <input type="number" id="strp" name="strp" min="0" value=0>
                    </td>
                </tr>
                <tr>
                    <td title="Background color of webcomic">
                        <label for="back_color">Background: </label>
                        <input name="back_color" id="back_color" style="visibility: hidden;">
                    </td>
                    <td title="Order of navigation button: Left to Right or Right to Left">
                        <label for="rdr_0">Reading Direction</label>
                        <input type="radio" id="rdr_0" name="rdi" checked>L -> R&nbsp;
                        <input type="radio" id="rdr_1" name="rdi">R -> L</td>
                </tr>
                <tr>
                    <td colspan="8">
                        <div class="spoiler" data-spoiler-link="1">
                            <span class="button">Loading Spinner</span>
                        </div>
                        <div class="spoiler-content" data-spoiler-link="1">
                            <table>
                                <tr>
                                    <td>
                                        <label for="dia">Diameter</label>
                                        <input style="width:100px;" type="number" name"dia" value=250 id="dia" min="1">
                                    </td>
                                    <td rowspan="8">
                                        <canvas id="custom_spin" class="center"></canvas>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <label for="lin">Lines: </label>
                                        <input style="width:35px;" type="number" name="lin" value=16 id="lin" min="1">
                                        <label for="rat">Rate(ms): </label>
                                        <input style="width:65px;" step="any" name="rat" value=33.333333333333336 id="rat" min="1">
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <label for="xpose">X-pos</label>
                                        <input style="width:50px;" type="number" step="0.01" name="xpose" value=0.5 id="xpose" min="0" max="1">
                                        <label for="ypose">Y-pos</label>
                                        <input style="width:50px;" type="number" step="0.01" name="ypose" value=0.5 id="ypose" min="0" max="1">
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <label for="back_load">Background: </label>
                                        <input name="back_load" id="back_load">
                                        <label for="color_load">Color: </label>
                                        <input name="color_load" id="color_load">
                                    </td>
                                </tr>
                            </table>
                        </div>
                    </td>
                </tr>
                <?php if($pID != '-1')
                echo '<tr>
                    <!--FilePaneToolbar-->
                    <td colspan=2 style="border: 4px solid #E2E2E2;background-color:#E2E2E2;width:100%;padding:5px">
                        <span id="AChp" class="button">Add Chapter</span>
                        &nbsp;&nbsp;&nbsp;&nbsp;
                        <span id="APge" class="button">Add Page</span>
                        &nbsp;&nbsp;&nbsp;&nbsp;
                        <span id="TpDir" class="button">Top Directory</span>
                        &nbsp;&nbsp;&nbsp;&nbsp;
                        <span id="UpDir" class="button">Up Directory</span>
                        &nbsp;&nbsp;&nbsp;&nbsp;
                        <label for='."Multi".'>Select Multiple&nbsp;</label>
                        <input id='."Multi".' type='."checkbox".'> &nbsp;&nbsp;&nbsp;&nbsp;
                        <input style="display: inline" id="conductor" type="file" multiple>
                        <input type="radio" id="fm_0" name="fm" checked>Page&nbsp;
                        <input type="radio" id="fm_1" name="fm">Chapter</td>
                    </td>
                </tr>
                <tr>
                    <!--FilePane-->
                    <td style="border: 4px solid #E2E2E2;width=20%;vertical-align:top">
                        <!--FilePaneTree-->
                        <!--glyphicon glyphicon-folder-open
                glyphicon glyphicon-file-->
                        <ul id="Tsort" class="empty">
                        </ul>
                    </td>
                    <td style="border: 4px solid #E2E2E2;width=80%;vertical-align:top">
                        <!--FilePaneGrid/List-->
                        <span id="edit"></span>
                        <ul id="Dsort" class="empty">
                        </ul>
                    </td>
                </tr>' ?>
            </table>
            <span class="button" id="ExBtn" title="Export Settings">Export</span>

            <!--<a href="../../" style="position:fixed;width:42px;height:42px;top:20px;left:10px;"><img src="../../assets/images/normal_glow.svg" style="position:absolute;top:0;left:0;width:90%;"/></a>-->
            <span id=MHEAD></span>
<script>
    var setup = function(){
        render();
    };
    var rootCHP = [];
    var explorer = function(map,pg,cp){
        var tree = '',
            TFoT = '<li><span class="glyphicon glyphicon-folder-open">',
            TFiT = '<li><span class="glyphicon glyphicon-file">',
            TClo = '</span></li>';
        for (var name in map) {
            if (map.hasOwnProperty(name)) {
                if(name=='-1'){
                    continue;
                } else{
                    //print chapter
                    //console.log(name);
                    tree += TFoT+" "+cp[name].title+" | pages: "+cp[name].start+" - "+cp[name].end+"<ul>"+explorer(map[name])+"</ul>"+TClo;
                }
            }
        }
        var namP;
        for(var page in map[-1]){
            if(pg[page].url.length>0){
                namP = pg[page].url[0].split("/");
                namP = namP[namP.length-1];
                namP = namP.split(".")[0];
            } else
                namP='';
            tree += TFiT+" "+namP+" | urls: "+pg[page].url.length+TClo;
        }
        return tree;
    }
    var render= function(attempts) {
        if (attempts === void 0 || attempts === null) attempts = 0;
        else if (attempts>20){
            console.error("render has timed out");
            return;
        }
        if(cG.comix===void 0){
            if(cG.stageInjection===void 0){
                setTimeout(render, 200,++attempts);
                return;
            }
            var setit;
            try {
                setit = JSON.parse('<?= get_option("data_$pID");?>');
            } catch(err) {
                setit = {set: false};
            }
            if(setit.set)
                cG.fBox.vscript = setit.data;
            else {
                //pull from settings
                if(pageD<0){
                    cG.fBox.vscript = {parent:null,offset:0,pyr:{appendmismatch:false,appendorder:0,appendorderdir:false},loading:{diameter: 250,lines:16,rate:33.333333333333336,xpos:0.5,ypos:0.5,back:"#FFF",color:"#373737"},config:{dir:"assets/",pagestartnum:false,chapterstartnum:false,imgprebuffer:5,imgpostbuffer:5,startpage:0,back:"#FFF"},pages:[],chapters:[]};
                } else {
                    //pull from default
                    cG.fBox.vscript = JSON.parse('<?php echo file_get_contents(plugins_url( '../json/default.djson', __FILE__ ));?>');
                }
            }
            cG.stageInjection();
            setTimeout(render, 200,++attempts);
            return;
        }
        var p = cG.comix.internals.pages;
        var c = cG.comix.internals.chapters;
        if (p.length+c.length < 1) {
            jQuery("#Tsort").removeClass("empty");
            jQuery("#Dsort").removeClass("empty");
        } else{
            jQuery("#Tsort").addClass("empty");
            jQuery("#Dsort").addClass("empty");
        }
        //console.log(p);
        //console.log(c);
        var tree = '',
            grid = '',
            DFoT = "<img class='icon tile' style='width:72px;height:72px;' src='"+ficon+"'",
            DFiT = "<img class='icon tile' style='width:72px;height:72px;' src='",
            DClo = "'>",
            chhr = {'-1':[]},
            wido,
            queue = [],
            namP;
        queue[p.length-1]=1;
        queue.fill(1, 0, p.length);
        for(var a=0;a<c.length;a++){//iterate through chapters
            if(c[a].parent<0){
                wido = chhr[a] = {'-1':[]};
            } else {
                //console.log(a,c[a].parent);
                if(c[a].parent==a||c[c[a].parent].parent==a){//sanity check
                    //I am my parent
                    if(c[a].parent==a) console.error("Rendering Error: Parent is Self");
                    //I am the parent of my parent 
                    if(c[c[a].parent].parent==a) console.error("Rendering Error: Parent is a Child");
                    return;
                }
                wido = chhr[c[a].parent][a] = {'-1':[]};
            }
            if(c[a].start>=0&&c[a].end>=0){
                for(var b=0;b<=(c[a].end-c[a].start);b++){
                    if(queue[c[a].start+b]){
                        wido[-1].push(c[a].start+b);
                        queue[c[a].start+b]=0;
                    }
                }
            }
        }
        if(p.length!=queue.length) console.log("MISMATCH",p.length,queue.length,queue);
        for(var d=0;d<p.length;d++){
            if(!queue[d]) continue;
            chhr[-1].push(d);
        }
        //console.log(chhr);
        if(!rootCHP.length){//top level
            for (var name in chhr) {
                if (chhr.hasOwnProperty(name)) {
                    if(name=='-1'){
                        continue;
                    } else{
                        if(c[name].thumb==""||c[name].thumb===void 0){
                            if((editfile.id==name)&&editfile.type)
                                grid += "<img class='icon tile modify' style='width:72px;height:72px;' src='folder_icon.png'";
                            else
                                grid += DFoT;
                        }
                        else{
                            if((editfile.id==name)&&editfile.type)
                                grid += "<img class='icon tile modify' style='width:72px;height:72px;' src='"+cG.comix.internals.config.dir+c[name].thumb+"'";
                            else
                                grid += DFiT+cG.comix.internals.config.dir+c[name].thumb+"'";
                        }
                        grid += "id='c"+name+"' onclick='settings(c" + name + ")'>";
                    }
                }
            }
            for(var page in chhr[-1]){
                if((editfile.id==page)&&!editfile.type)
                    grid += "<img class='icon tile modify' style='width:72px;height:72px;' src='";
                else
                    grid += DFiT;
                if (!p[page].absolute) grid += cG.comix.internals.config.dir;
                grid += p[page].url[0]+"'id='s"+page+"' onclick='settings(s" + page + ")'>";
            }
        } else{
            var ship=chhr;
            for(var path in rootCHP)
                ship=ship[path];
            for (var name in ship) {
                if (ship.hasOwnProperty(name)) {
                    if(name=='-1'){
                        continue;
                    } else{
                        if(c[name].thumb==""||c[name].thumb===void 0){
                            if((editfile.id==name)&&editfile.type)
                                grid += "<img class='icon tile modify' style='width:72px;height:72px;' src='folder_icon.png'";
                            else
                                grid += DFoT;
                        }
                        else{
                            if((editfile.id==name)&&editfile.type)
                                grid += "<img class='icon tile modify' style='width:72px;height:72px;' src='"+cG.comix.internals.config.dir+c[name].thumb+"'";
                            else
                                grid += DFiT+cG.comix.internals.config.dir+c[name].thumb+"'";
                        }
                        grid += "id='c"+name+"' onclick='settings(c" + name + ")'>";
                    }
                }
            }
            for(var page in ship[-1]){
                if((editfile.id==page)&&!editfile.type)
                    grid = "<img class='icon tile modify' style='width:72px;height:72px;' src='";
                else
                    grid += DFiT
                if (!p[page].absolute) grid += cG.comix.internals.config.dir;
                grid += p[page].url[0]+"'id='s"+page+"' onclick='settings(s" + page + ")'>";
            }
        }
        tree=explorer(chhr,p,c);
        //console.log(tree);
        jQuery("#Tsort").html(tree);
        jQuery("#Dsort").html(grid);
    };
    var editfile = {id: [-1], type: 0, dirty: false, multi: false},
        //id corresponds with index in page/chapter array, type is 0 = page or 1 = chapter, dirty is whether or not changes need to be saved
        expfunct,
        settings,
        remveC,
        remveP,
        report,
        workhorse = function() {
            if (settings,void 0 === window.jQuery || void 0 === window.jQuery.ui /*|| void 0 === window.humane*/||void 0 === cG.comix)
                return setTimeout(workhorse, 300);
            /*var jQ = jQuery.noConflict();*/
            console.log("%c %c %c comix-ngn Writer v" + cG.info.vwr + " %c \u262F %c \u00A9 2015 Oluwaseun Ogedengbe %c ", "color:white; background:#B5B5B5", "background:purple", "color:black; background:#E2E2E2", 'color:red; background:black', "color:black; background:#B5B5B5", "background:purple");
            var Virtual = cG.comix.internals;
            //Loading Spinner GFX INIT
            var spin = {
                start: Date.now(),
                lines: 16,
                rate: 33.333333333333336,
                cwidth: 300,
                cheight: 150,
                diameter: 250,
                xpos: 0.5,
                ypos: 0.5,
                back: "#fff",
                color: "#373737",
                context: document.getElementById("custom_spin").getContext("2d")
            },
                fspin = function() {
                    jQuery("#custom_spin").css("background",spin.back);
                    var rotation = Math.floor(((Date.now() - spin.start) / 1000) * spin.lines) / spin.lines,
                        c = spin.color.substr(1);
                    spin.context.save();
                    spin.context.clearRect(0, 0, spin.cwidth, spin.cheight);
                    spin.context.translate(spin.cwidth / 2, spin.cheight / 2);
                    spin.context.rotate(Math.PI * 2 * rotation);
                    if (c.length == 3) c = c[0] + C[0] + c[1] + c[1] + c[2] + c[2];
                    var red = parseInt(c.substr(0, 2), 16).toString(),
                        green = parseInt(c.substr(2, 2), 16).toString(),
                        blue = parseInt(c.substr(4, 2), 16).toString();
                    for (var i = 0; i < spin.lines; i++) {
                        spin.context.beginPath();
                        spin.context.rotate(Math.PI * 2 / spin.lines);
                        spin.context.moveTo(spin.diameter / 10, 0);
                        spin.context.lineTo(spin.diameter / 4, 0);
                        spin.context.lineWidth = spin.diameter / 30;
                        spin.context.strokeStyle = "rgba(" + red + "," + green + "," + blue + "," + i / spin.lines + ")";
                        spin.context.stroke();
                    }
                    spin.context.restore();
                    /*console.log(spin.rate)*/
                    window.setTimeout(fspin, spin.rate);
                }
            //
            //jQuery("#CHPHEAD").data({});
            //Writer GUI Options
            jQuery("#confhead").click(function() {
                if (jQuery("#bodtab").attr("border") == "1") {
                    jQuery("#bodtab").attr("border", "0");
                } else {
                    jQuery("#bodtab").attr("border", "1");
                }
            });
            jQuery("#accordion").accordion({
                collapsible: true,
                heightStyle: "content"
            });
            /*.sortable({
                        axis: "y",
                        handle: "h3",
                        stop: function( event, ui ) {
                          // IE doesn't register the blur when sorting
                          // so trigger focusout handlers to remove .ui-state-focus
                          ui.item.children( "h3" ).triggerHandler( "focusout" );

                          // Refresh accordion to handle new order
                          jQuery( this ).accordion( "refresh" );
                        }
                      });*/
            //Loader spinner GFX color settings
            jQuery.data(jQuery("#back_color"),"color","#fff");
            jQuery("#back_color").spectrum({
                color: "#fff",
                change: function(color) {
                    jQuery.data(jQuery("#back_color"),"color",color.toHexString());
                }
            }).css("visibility", "visible" );
            jQuery("#color_load").spectrum({
                color: "#373737",
                change: function(color){
                    spin.color = color.toHexString();
                }
            });
            jQuery("#back_load").spectrum({
                color: "#fff",
                change: function(color){
                    spin.back = color.toHexString(); 
                }
            });
            jQuery(".spoiler").spoiler();
            window.setTimeout(fspin, spin.rate);
            var spinsetchange = function(){
                spin.lines = jQuery("#lin").val();
                spin.rate = jaz.resolveRPN(jaz.shuntingYard(jQuery("#rat").val()));
                jQuery("#rat").val(spin.rate);
                spin.diameter = jQuery("#dia").val();
                spin.xpos = jQuery("#xpose").val();
                spin.ypos = jQuery("#ypose").val();
            }
            jQuery("#lin").change(spinsetchange);
            jQuery("#rat").change(spinsetchange);
            jQuery("#dia").change(spinsetchange);
            jQuery("#xpose").change(spinsetchange);
            jQuery("#ypose").change(spinsetchange);
            jQuery("#back_load").change(spinsetchange);
            jQuery("#color_load").change(spinsetchange);
            /*
        jQuery(".spoiler-content").show();
        jQuery("#design_contain").show();*/
            var addthing = function(page, source) {
                if(source===void 0)
                    source = {image: ''};
                if(page)
                    Virtual.pages.push({alt:"",hover:"",title:"",url:[source.image],release:0,note:"",perm:!1,anim8:!1, absolute:false});
                else
                    Virtual.chapters.push({description:"",end: -1,start: -1,title: "Chapter",thumb: source.image, parent:-1});
                render();
            }
            jQuery("#AChp").click(function() {
                addthing(false);
            });
            jQuery("#APge").click(function() {
                addthing(true);
            });
            jQuery("#TpDir").click(function() {
                rootCHP = [];
            });
            jQuery("#UpDir").click(function() {
                rootCHP.pop();
            });
            jQuery("#Multi").change(function() {
                editfile.multi = document.getElementById('Multi').checked;
            });
            jQuery("#conductor").change(function() {
                if (jQuery("#sorted").hasClass("empty")) {
                    jQuery("#sorted").removeClass("empty");
                }
                console.log(this.files);
                for (var i = 0; i < this.files.length; i++) {
                    addthing(document.getElementById('fm_0').checked,{image:this.files[i].name});
                }
            });
            jQuery("#mergeadd").change(function() {
                delete window.confirm;
                if ((!jQuery("#Tsort").hasClass("empty") || !jQuery("#Dsort").hasClass("empty")) && !confirm("This will add pages, are you sure?")) {
                    this.files = {};
                    return;
                }
                //console.log(this.files);
                if (!this.files.length) return;
                
                jQuery("#sorted").empty();
                jQuery("#Csort").empty();
                /*if (!this.files[0].type.match()) {
                    throw "File Type must be an image";
                }*/

                // Using FileReader to display the image content
                var reader = new FileReader();
                reader.onload = function(e) {
                    var result = JSON.parse(e.target.result);
                    if(result.p===void 0||result.p===null) return -1;
                    if(!result.p.length) return -1;
                    /*if(!cG.script.pages[0].url.length){
                        //removes empty pages before add render
                        cG.REPO.script.def.pages.splice(0, 1);
                        cG.script = cG.REPO.script.def;
                    }*/
                    cG.script = cG.REPO.script.def = result;
                    report(cG.script);
                    jQuery(".venue").stageInjection();
                    Virtual = cG.comix.internals;
                };
                reader.readAsText(this.files[0]);
            });
            jQuery("#historian").change(function() {
                //delete window.confirm;
                if ((!jQuery("#Tsort").hasClass("empty") || !jQuery("#Dsort").hasClass("empty")) && !confirm("This will overwrite your current configuration, are you sure?")) {
                    this.files = {};
                    return;
                }
                console.log(this.files);
                if (!this.files.length) return;
                /*jQuery("#sorted").innerHTML ="";*/
                //console.log("INSIDE",jQuery("#sorted"),jQuery("#sorted").html());
                <?php if($pID != '-1') echo '
                jQuery("#Dsort").empty();
                jQuery("#Tsort").empty();'?>

                /*if (!this.files[0].type.match()) {
                    throw "File Type must be an image";
                }*/

                // Using FileReader to display the image content
                var reader = new FileReader();
                reader.onload = function(e) {
                    var result = JSON.parse(e.target.result);
                    if(result.config===void 0||result.config===null)
                        return -1;
                    cG.script = cG.REPO.script.def = result;
                    report(cG.script);
                    jQuery(".venue").stageInjection();
                    Virtual = cG.comix.internals;
                    <?php if($pID != '-1') echo 'render();'?>
                };
                reader.readAsText(this.files[0]);
            });
            movingtoolbar=false;
            jQuery(document.body).mousemove(function() {
                if(!movingtoolbar) return 0;
                event.preventDefault();
                jQuery("#nav-toolbar").offset({top: event.pageY-10,left: event.pageX-10});
            });
            jQuery("#nav-move").click(function() {
                //console.log("nav-move");
                if(movingtoolbar) movingtoolbar=false;
                else movingtoolbar=true;
                //event.preventDefault();
            });
            jQuery("#_set").click(function() {
                jQuery("#settings_contain").slideToggle();
            });
            jQuery("#_des").click(function() {
                jQuery("#design_contain").slideToggle();
            });
            jQuery("#ExBtn").click(function(){return expfunct()});
            jQuery("#ExBtnCL").click(function(){return expfunct()});
            jQuery("#submit").hover(function(){
                return expfunct(true);
            },null);
            expfunct = function(php) {
                /*delete window.alert;
                    alert("Settings Configured!");*/
                var inclusion = ["parent","offset","config", "pyr", "loading", "pages", "chapters", "dir", "startpage", "pagestartnum", "readdir" , "additive", "chapterstartnum", "imgprebuffer", "imgpostbuffer", "back", "appendmismatch", "appendorder", "appendorderdir", "alt", "hover", "title","perm","anim8","special", "url", "release", "note", "absolute", "description", "start", "end", "title", "thumb", "diameter","lines","rate","xpos","ypos","back","color"];
                Virtual.config.dir = jQuery("#dir").val();
                    Virtual.config.pagestartnum = document.getElementById("psn_1").checked;
                    Virtual.config.readdir = document.getElementById("rdr_1").checked;
                    Virtual.config.additive = jQuery("#add_").val();//document.getElementById("add_1").checked;
                    Virtual.config.chapterstartnum = document.getElementById("csn_1").checked;
                Virtual.config.startpage = parseInt(jQuery("#strp").val(),10);/*document.getElementById("strp_1").checked;*/
                Virtual.config.imgprebuffer = parseInt(jQuery("#prb").val(),10);
                Virtual.config.imgpostbuffer = parseInt(jQuery("#ptb").val(),10);
                Virtual.config.back = jQuery.data(jQuery("#ptb"),"color");
                Virtual.pyr.appendmismatch = document.getElementById("pyr_0").checked;
                if (document.getElementById("spyr_0").checked) {
                    Virtual.pyr.appendorder = 0;
                } else if (document.getElementById("spyr_1").checked) {
                    Virtual.pyr.appendorder = 1;
                } else if (document.getElementById("spyr_2").checked) {
                    Virtual.pyr.appendorder = 2;
                } else if (document.getElementById("spyr_3").checked) {
                    Virtual.pyr.appendorder = 3;
                }
                Virtual.pyr.appendorderdir = document.getElementById("spyro_0").checked;
                Virtual.loading = spin;
                jQuery('.setlink').remove();
                if(!php||php===void 0){
                    var refh = "<a onClick=jQuery('.setlink').remove() class='setlink' href='data: text/json;charset=utf-8," + JSON.stringify(Virtual, inclusion) + "' download='config.json' autofocus>config.json<br></a>",
                        formref = "<a onClick=jQuery('.setlink').remove() class='setlink' href='data: text/json;charset=utf-8," + JSON.stringify(Virtual,inclusion,4) + "' download='config.json' autofocus>config.json<br></a>";
                    console.log(formref);
                    jQuery(refh).appendTo("#MHEAD");
                    jQuery(refh).appendTo("#MHEADCL");
                } else {
                    inclusion.push('set');
                    inclusion.push('data');
                    var dat = JSON.stringify({set:true,data:Virtual}, inclusion);
                   console.log("PHP is "+php+", printing "+dat); jQuery("#data").val(dat);
                    //jQuery("#set").val(true);
                }
            };
            /*jQuery("#InBtn").click(function() {
                jQuery('#indlink').remove();
                var refh = "";
                console.log(refh);
                jQuery(refh).appendTo("#MHEAD");
            });
            jQuery("#DsBtn").click(function() {
                jQuery('#deslink').remove(); temporary, using predefined scene
                var refh = "OUTDATED";
                console.log(refh);
                jQuery(refh).appendTo("#MHEAD");
            });*/ 
            confaction = function(op) {
                if(!editfile.type&&op>=0){
                    if(op){
                        Virtual.pages[editfile.id[0]].title=jQuery("#TEMP_title").val();
                        Virtual.pages[editfile.id[0]].hover=jQuery("#TEMP_hover").val();
                        Virtual.pages[editfile.id[0]].note=jQuery("#TEMP_note").val();
                        Virtual.pages[editfile.id[0]].alt=jQuery("#TEMP_alt").val();
                        Virtual.pages[editfile.id[0]].release=jQuery("#TEMP_release").val();
                        Virtual.pages[editfile.id[0]].url=[jQuery("#TEMP_url").val()];
                        Virtual.pages[editfile.id[0]].perm=document.getElementById("TEMP_perm").checked;
                        Virtual.pages[editfile.id[0]].anim8=document.getElementById("TEMP_anim8").checked;
                        Virtual.pages[editfile.id[0]].special=jQuery("#TEMP_special").val();
                        Virtual.pages[editfile.id[0]].absolute=document.getElementById("TEMP_abs").checked;
                        switch(editfile.id[0]) {
                            case 0:
                                Virtual.pages[editfile.id[0]].desig=-1
                                break;
                            case Virtual.pages.length-1:
                                Virtual.pages[editfile.id[0]].desig=1;
                                break;
                            default:
                                Virtual.pages[editfile.id[0]].desig=0;
                        }
                        Virtual.pages[editfile.id[0]].loaded = false;
                    }
                    else
                        Virtual.pages.splice(editfile.id[0], 1);
                }
                else if (op>=0){
                    if(op){
                        Virtual.chapters[editfile.id[0]].title=jQuery("#TEMP_title").val();
                        Virtual.chapters[editfile.id[0]].thumb=jQuery("#TEMP_thumb").val();
                        Virtual.chapters[editfile.id[0]].description=jQuery("#TEMP_description").val();
                        Virtual.chapters[editfile.id[0]].start=jQuery("#TEMP_start").val();
                        Virtual.chapters[editfile.id[0]].end=jQuery("#TEMP_end").val();
                        Virtual.chapters[editfile.id[0]].parent=jQuery("#TEMP_par").val();
                    }
                    else
                        Virtual.pages.splice(editfile.id[0], 1);
                }
                jQuery('#edit').empty();
                editfile.id=[-1];
                editfile.dirty=false;
                editfile.type=0;
                editfile.multi=false;
                //if (op>=0)
                render();
            }
            settings = function(ele) {
                var key = ele.id;
                var lee = key.substring(1);
                var res = '';
                var p;
                var base;
                var end = "<button id='sveset' onclick='confaction(1)'>Save</button>&nbsp;<button id='canset' onclick='confaction(-1)'>Cancel</button>&nbsp;<button id='delset' style='color:red;' onclick='confaction(0)'>Delete</button>";
                if(key[0]=='s'){
                    p = Virtual.pages;
                    editfile.type = 0;
                    base = "<form id='TEMPFORM' autofocus><label for='TEMP_title'>Title&nbsp</label><input value='" + p[lee].title + "' id='TEMP_title' type='text' autofocus><br><label for='TEMP_hover'>Hover&nbsp</label><input value='" + p[lee].hover + "' id='TEMP_hover' type='text' title='Text on Mouse Over'><br><label for='TEMP_note'>Image Info&nbsp</label><input value='" + p[lee].note + "' id='TEMP_note' type='text'><br><label for='TEMP_alt'>Alt Text&nbsp</label><input value='" + p[lee].alt + "' id='TEMP_alt' type='text' title='If the image fails to load this text is loaded instead'><br><label for='TEMP_release'>Release Date&nbsp </label><input value='" + p[lee].release + "' id='TEMP_release' type='number' title='When should this slide be avaliable'><br><label for='TEMP_url'>URL&nbsp</label><input value='" + p[lee].url + "' id='TEMP_url' type='text' title='Filename of the image'><br><label for='TEMP_perm'>Permanent&nbsp</label><input " + p[lee].perm + " id='TEMP_perm' type='checkbox' title='Whether the image should always be loaded'><br><label for='TEMP_anim8'>Animate&nbsp</label><input " + p[lee].anim8 + " id='TEMP_anim8' type='checkbox' title='Whether the image/slide is animated'><br><label for='TEMP_abs'>Absolute&nbsp</label><input " + p[lee].absolute + " id='TEMP_abs' type='checkbox' title='The path is absolute(ignores asset path)'><br><label for='TEMP_special'>Special Code:&nbsp</label><textarea rows='4' cols='50' id='TEMP_perm'title='If the slide is not a static image, video/object/embed, put the code to render it here'></textarea><br></form>";
                }
                else{
                    p = Virtual.chapters;
                    editfile.type = 1;
                    base = "<form id='TEMPFORM' autofocus><label for='TEMP_title'>Title&nbsp</label><input value='" + p[lee].title + "' id='TEMP_title' type='text' autofocus><br><label for='TEMP_thumb'>Thumbnail&nbsp</label><input value='" + p[lee].thumb + "' id='TEMP_thumb' type='text'><br><label for='TEMP_description'>Description&nbsp</label><input value='" + p[lee].description + "' id='TEMP_description' type='text' title='Chapter description'><br><label for='TEMP_start'>Start&nbsp</label><input value='" + p[lee].start + "' id='TEMP_start' type='number' min='-1' title='Starting page ID value, use -1 if the chapter contains no starting page'>&nbsp;&nbsp;<label for='TEMP_end'>End&nbsp</label><input value='" + p[lee].end + "' id='TEMP_end' type='number' min='-1' title='Ending page ID value, use -1 if the chapter contains no ending page'><br><label for='TEMP_par'>Parent ID&nbsp</label><input value='" + p[lee].parent + "' id='TEMP_par' type= 'number' min='-1' title='Parent Chapter ID, use -1 if the chapter has no parent'><br></form>";
                } 
                if(!editfile.dirty && !editfile.multi){
                    jQuery('#'+key).addClass('modify');
                    editfile.id[0]=parseInt(lee);
                    jQuery('#edit').empty();
                    jQuery('#edit').append(base+end);
                    jQuery('#edit').focus();
                    render();
                } else if(editfile.dirty && !editfile.multi){
                    if (!confirm("You have unsaved settings, Overwrite?")) {
                        editfile.dirty = false;
                        jQuery('#edit').empty();
                        jQuery('#edit').append(base+end);
                        jQuery('#edit').focus();
                    }
                }
            }
            report = function(conf) {
                //console.log(conf);
                document.getElementById("psn_0").checked = false;
                document.getElementById("psn_1").checked = false;
                document.getElementById("rdr_0").checked = false;
                document.getElementById("rdr_1").checked = false;
                //document.getElementById("add_0").checked = false;
                //document.getElementById("add_1").checked = false;
                document.getElementById("csn_0").checked = false;
                document.getElementById("csn_1").checked = false;
                /*document.getElementById("strp_0").checked = false;
            document.getElementById("strp_1").checked = false;*/
                document.getElementById("pyr_0").checked = false;
                document.getElementById("pyr_1").checked = false;
                document.getElementById("spyr_0").checked = false;
                document.getElementById("spyr_1").checked = false;
                document.getElementById("spyr_2").checked = false;
                document.getElementById("spyr_3").checked = false;  
                document.getElementById("spyro_0").checked = false;
                document.getElementById("spyro_1").checked = false;

                if (typeof conf.config === 'undefined') { //config module dependency
                    //default settings
                    jQuery("#dir").val("assets/");
                    jQuery("#add_").val("");
                    jQuery("#prb").val("5");
                    jQuery("#strp").val("0");
                    jQuery.data(jQuery("#back_color"),"color","#fff"); 
                    document.getElementById("rdr_1").checked = true; 
                    //document.getElementById("add_1").checked = true; 
                    document.getElementById("psn_1").checked = true;
                    document.getElementById("csn_1").checked = true;
                } else {
                    jQuery("#dir").val(conf.config.dir);
                    jQuery("#prb").val(conf.config.imgprebuffer);
                    jQuery("#ptb").val(conf.config.imgpostbuffer);
                    if (typeof conf.config.startpage === 'undefined') {
                        jQuery("#strp").val("0");
                    } else if (conf.config.startpage) {
                        jQuery("#strp").val(conf.config.startpage);
                    }
                    if (typeof conf.config.additive === void 0) {
                        jQuery("#add_").val("0");
                    } else if (conf.config.additive) {
                        jQuery("#add_").val(conf.config.additive);
                    }
                    if (typeof conf.config.back === 'undefined') {
                        jQuery.data(jQuery("#back_color"),"color","#fff"); 
                    } else if (conf.config.back) {
                        jQuery.data(jQuery("#back_color"),"color","#fff");
                        jQuery("#back_color").spectrum.color = conf.config.back;//I DONT EVEN KNOW IF THIS WILL WORK, BUT FCK IT
                    }
                    if (conf.config.pagestartnum) document.getElementById("psn_1").checked = true;
                    else document.getElementById("psn_0").checked = true;
                    if (conf.config.readdir) document.getElementById("rdr_1").checked = true;
                    else document.getElementById("rdr_0").checked = true;
                    //if (conf.config.additive) document.getElementById("add_1").checked = true;
                    //else document.getElementById("add_0").checked = true;
                    if (conf.config.chapterstartnum) document.getElementById("csn_1").checked = true;
                    else document.getElementById("csn_0").checked = true;
                }
                if (typeof conf.pyr === 'undefined') { //pyr module dependency
                    //default settings
                    document.getElementById("pyr_0").checked = true;
                    document.getElementById("spyr_0").checked = true;
                    document.getElementById("spyro_0").checked = true;
                } else {
                    if (conf.pyr.appendmismatch) {
                        document.getElementById("pyr_0").checked = true;
                    } else {
                        document.getElementById("pyr_1").checked = true;
                    }
                    if (!conf.pyr.appendorder) {
                        document.getElementById("spyr_0").checked = true;
                    } else if (conf.pyr.appendorder == 1) {
                        document.getElementById("spyr_1").checked = true;
                    } else if (conf.pyr.appendorder == 2) {
                        document.getElementById("spyr_2").checked = true;
                    } else if (conf.pyr.appendorder == 3) {
                        document.getElementById("spyr_3").checked = true;
                    }
                    if (conf.pyr.appendorderdir) {
                        document.getElementById("spyro_0").checked = true;
                    } else {
                        document.getElementById("spyro_1").checked = true;
                    }
                }
                if (typeof conf.loading === 'undefined') { /*loading module dependency*/
                    /*default settings*/
                    jQuery("#lin").val(16);
                    jQuery("#rat").val(33.333333333333336);
                    jQuery("#dia").val(250);
                    jQuery("#xpose").val(0.5);
                    jQuery("#ypose").val(0.5);
                    jQuery("#back_load").spectrum.color="#fff";
                    jQuery("#color_load").spectrum.color="#373737";
                } else {
                    jQuery("#lin").val(conf.loading.lines);
                    jQuery("#rat").val(conf.loading.rate);
                    jQuery("#dia").val(conf.loading.diameter);
                    jQuery("#xpose").val(conf.loading.xpos);
                    jQuery("#ypose").val(conf.loading.ypos);
                    jQuery("#back_load").spectrum.color=conf.loading.back;
                    jQuery("#color_load").spectrum.color=conf.loading.color;
                }
            }
        }
        dfr=function(){
            /*!
     * Implementation of the Shunting yard algorithm
     * look it up: http://en.wikipedia.org/wiki/Shunting-yard_algorithm
     *
     * Copyright 2013, Georg Tavonius
     * Licensed under the MIT license.
     *
     * @version 1.0.1
     *
     * @author Georg Tavonius a.k.a. Calamari (http://github.com/Calamari)
     * @homepage http://github.com/Calamari/shunting-yard.js
     */!function(e){"use strict";function t(e,t,n,r,i){return n=n||"left",{name:e,precedence:t,params:r,method:i,greaterThen:function(e){return t>e.precedence},greaterThenEqual:function(e){return t>=e.precedence},equalThen:function(e){return t===e.precedence},lessThen:function(e){return t<e.precedence},lessThenEqual:function(e){return t<=e.precedence},leftAssoc:function(){return"left"===n},rightAssoc:function(){return"right"===n}}}function n(e,t,n){return{name:e,params:t,method:n}}var r=window.jaz||{};r.shuntingYard=function(t){function n(e){return"("===e}function i(e){return")"===e}function s(e){return r.Operators[e]}function c(e){return r.Functions[e]}var o,a,d,l,u,f,h,p=[],v=[];for(d=0,l=t.length;l>d;++d)if(u=t[d]," "!==u){if(a&&(u=a+=u,a=null),n(u))v.push(u);else if(c(u))v.push(u);else if(i(u)){for(;(f=v.pop())&&!n(f);)c(f)||p.push(f);if(f===e)return null}else if(s(u)){if(!o||"("===o){a=u;continue}for(;v.length&&(h=r.Operators[u],f=r.Operators[v[v.length-1]],f&&h)&&(h.leftAssoc()&&h.lessThenEqual(f)||h.lessThen(f));)p.push(v.pop());v.push(u)}else!o||n(o)||s(o)?p.push(u):p[p.length-1]+=u;o=u}for(;v.length;){if(u=v.pop(),n(u))return null;p.push(u)}return p},r.Operator=t,r.Operators={"+":new t("+",2,"left",2,function(e,t){return e+t}),"-":new t("-",2,"left",2,function(e,t){return e-t}),"*":new t("*",3,"left",2,function(e,t){return e*t}),"/":new t("/",3,"left",2,function(e,t){return e/t}),"^":new t("^",4,"right",2,function(e,t){return Math.pow(e,t)})},r.Function=n,r.Functions={},window.jaz=r}(),/*!
     * Resolves a RPN
     *
     * Copyright 2013, Georg Tavonius
     * Licensed under the MIT license.
     *
     * @author Georg Tavonius a.k.a. Calamari (http://github.com/Calamari)
     * @homepage http://github.com/Calamari/shunting-yard.js
     */!function(){"use strict";var e=window.jaz||{};e.resolveRPN=function(t){function n(t){return e.Operators[t]||e.Functions[t]}var r,i,s,c=[];for(r=0,i=t.length;i>r;++r)s=n(t[r]),c.push(s?s.method.apply(this,c.splice(-s.params)):parseFloat(t[r]));return c[0]},window.jaz=e}();jqdep();/*! humane.js: wavded.github.com/humane-js/ (MIT) (c) Marc Harter (@wavded)*/!function(e,t,n){"undefined"!=typeof module?module.exports=n(e,t):"function"==typeof define&&"object"==typeof define.amd?define(n):t[e]=n(e,t)}("humane",this,function(){var e=window,t=document,n={on:function(t,n,r){"addEventListener"in e?t.addEventListener(n,r,!1):t.attachEvent("on"+n,r)},off:function(t,n,r){"removeEventListener"in e?t.removeEventListener(n,r,!1):t.detachEvent("on"+n,r)},bind:function(e,t){return function(){e.apply(t,arguments)}},isArray:Array.isArray||function(e){return"[object Array]"===Object.prototype.toString.call(e)},config:function(e,t){return null!=e?e:t},transSupport:!1,useFilter:/msie [678]/i.test(navigator.userAgent),_checkTransition:function(){var e=t.createElement("div"),n={webkit:"webkit",Moz:"",O:"o",ms:"MS"};for(var r in n)r+"Transition"in e.style&&(this.vendorPrefix=n[r],this.transSupport=!0)}};n._checkTransition();var r=function(t){t||(t={}),this.queue=[],this.baseCls=t.baseCls||"humane",this.addnCls=t.addnCls||"",this.timeout="timeout"in t?t.timeout:2500,this.waitForMove=t.waitForMove||!1,this.clickToClose=t.clickToClose||!1,this.timeoutAfterMove=t.timeoutAfterMove||!1,this.container=t.container;try{this._setupEl()}catch(r){n.on(e,"load",n.bind(this._setupEl,this))}};return r.prototype={constructor:r,_setupEl:function(){var e=t.createElement("div");if(e.style.display="none",!this.container){if(!t.body)throw"document.body is null";this.container=t.body}this.container.appendChild(e),this.el=e,this.removeEvent=n.bind(function(){var e=n.config(this.currentMsg.timeoutAfterMove,this.timeoutAfterMove);e?setTimeout(n.bind(this.remove,this),e):this.remove()},this),this.transEvent=n.bind(this._afterAnimation,this),this._run()},_afterTimeout:function(){n.config(this.currentMsg.waitForMove,this.waitForMove)?this.removeEventsSet||(n.on(t.body,"mousemove",this.removeEvent),n.on(t.body,"click",this.removeEvent),n.on(t.body,"keypress",this.removeEvent),n.on(t.body,"touchstart",this.removeEvent),this.removeEventsSet=!0):this.remove()},_run:function(){if(!this._animating&&this.queue.length&&this.el){this._animating=!0,this.currentTimer&&(clearTimeout(this.currentTimer),this.currentTimer=null);var e=this.queue.shift(),t=n.config(e.clickToClose,this.clickToClose);t&&(n.on(this.el,"click",this.removeEvent),n.on(this.el,"touchstart",this.removeEvent));var r=n.config(e.timeout,this.timeout);r>0&&(this.currentTimer=setTimeout(n.bind(this._afterTimeout,this),r)),n.isArray(e.html)&&(e.html="<ul><li>"+e.html.join("<li>")+"</ul>"),this.el.innerHTML=e.html,this.currentMsg=e,this.el.className=this.baseCls,n.transSupport?(this.el.style.display="block",setTimeout(n.bind(this._showMsg,this),50)):this._showMsg()}},_setOpacity:function(e){if(n.useFilter)try{this.el.filters.item("DXImageTransform.Microsoft.Alpha").Opacity=100*e}catch(t){}else this.el.style.opacity=e+""},_showMsg:function(){var e=n.config(this.currentMsg.addnCls,this.addnCls);if(n.transSupport)this.el.className=this.baseCls+" "+e+" "+this.baseCls+"-animate";else{var t=0;this.el.className=this.baseCls+" "+e+" "+this.baseCls+"-js-animate",this._setOpacity(0),this.el.style.display="block";var r=this,i=setInterval(function(){1>t?(t+=.1,t>1&&(t=1),r._setOpacity(t)):clearInterval(i)},30)}},_hideMsg:function(){var e=n.config(this.currentMsg.addnCls,this.addnCls);if(n.transSupport)this.el.className=this.baseCls+" "+e,n.on(this.el,n.vendorPrefix?n.vendorPrefix+"TransitionEnd":"transitionend",this.transEvent);else var t=1,r=this,i=setInterval(function(){t>0?(t-=.1,0>t&&(t=0),r._setOpacity(t)):(r.el.className=r.baseCls+" "+e,clearInterval(i),r._afterAnimation())},30)},_afterAnimation:function(){n.transSupport&&n.off(this.el,n.vendorPrefix?n.vendorPrefix+"TransitionEnd":"transitionend",this.transEvent),this.currentMsg.cb&&this.currentMsg.cb(),this.el.style.display="none",this._animating=!1,this._run()},remove:function(e){var r="function"==typeof e?e:null;n.off(t.body,"mousemove",this.removeEvent),n.off(t.body,"click",this.removeEvent),n.off(t.body,"keypress",this.removeEvent),n.off(t.body,"touchstart",this.removeEvent),n.off(this.el,"click",this.removeEvent),n.off(this.el,"touchstart",this.removeEvent),this.removeEventsSet=!1,r&&this.currentMsg&&(this.currentMsg.cb=r),this._animating?this._hideMsg():r&&r()},log:function(e,t,n,r){var i={};if(r)for(var s in r)i[s]=r[s];if("function"==typeof t)n=t;else if(t)for(var s in t)i[s]=t[s];return i.html=e,n&&(i.cb=n),this.queue.push(i),this._run(),this},spawn:function(e){var t=this;return function(n,r,i){return t.log.call(t,n,r,i,e),t}},create:function(e){return new r(e)}},new r})};
        var jqdep=function(){if(void 0===window.jQuery)return setTimeout(jqdep,300);var e;/*! jquery-spoiler v1.3.0: (MIT) (c)2014 Triangle717 (http://le717.github.io) and Jarred Ballard (http://jarred.io/)*/!function(e){"use strict";"function"==typeof define&&define.amd?define(["jquery"],e):"object"==typeof exports?module.exports=e:e(jQuery)}(function(e){"use strict";e.fn.spoiler=function(t){var n=e.extend({contentClass:"spoiler-content",paddingValue:6,triggerEvents:!1,includePadding:!0,buttonActiveClass:"spoiler-active",spoilerVisibleClass:"spoiler-content-visible"},t),r="."+n.contentClass,i={};return e(r).each(function(){var t=e(this);t.css("overflow","hidden");var r=t.prop("scrollHeight");r=n.includePadding?r+parseInt(n.paddingValue,10):r;var s=t.attr("data-spoiler-link");i[s]=r+"px",t.css("height","0")}),e(this).on("click",function(){var t=e(this),s=t.attr("data-spoiler-link"),c=e(r+"[data-spoiler-link="+s+"]"),o={height:i[s]},a={height:"0"},d=c.hasClass(n.spoilerVisibleClass);c.css(d?a:o),n.triggerEvents&&t.trigger(d?"jq-spoiler-hidden":"jq-spoiler-visible"),c.toggleClass(n.spoilerVisibleClass),t.toggleClass(n.buttonActiveClass)}),this}});setup();workhorse()};

    !function() {
        return defer ? void(window.addEventListener ? window.addEventListener("load", dfr, !1) : window.attachEvent ? window.attachEvent("onload", dfr) : window.onload = dfr) : dfr()
    }();
    var ficon = "data:image/png;base64,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"
</script>
            <?php submit_button(); ?>
        </form>
    </div>
    <h3 class="button" role="button">* Design</h3>
    <div id="design_contain">
        <!-- style="display: none;">-->
        <p>
            <!--<button id="InBtn" title="Create site template; this does not save settings it simply creates an index.html file">Site Template</button>&nbsp;
            <button id="DsBtn" title="Save Stage Design">Save Design</button>-->
        </p>
        <div id class="venue"></div>
    </div>
</div>
</div>
<?php }