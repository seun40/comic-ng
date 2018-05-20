interface page {
    alt: string,
    anim8: boolean,
    hover: string,
    note: string,
    perm: boolean,
    release: number,//time in ms
    title: string,
    url: string[],
    special: string,
    absolute?: boolean
}
interface chapter {
    description: string,
    end: number,
    start: number,
    title: string
}
interface script {
    chapters: chapter[],
    config: {
        chapterstartnum: boolean,
        dir: string,
        imgpostbuffer: number,
        imgprebuffer: number,
        pagestartnum: boolean,
        startpage: number,
        back: string,
    },
    loading: {
        diameter: number,
        lines: number,
        rate: number,
        xpos: number,
        ypos: number,
        back: string,
        color: string
    },
    offset: number,
    pages: page[],
    parent: any,
}
///////
cG.REPO.stage = (direction: (
    input:string[], 
    anchor?:HTMLElement, 
    owrite?:number, 
    config?:object) => void) => {
    return {
        "def": {
            id: "def",
            construct: function (name: string, scriptt: script, anchor: HTMLElement, options: object) {
                var chek = function (truth:any, fals:any, iimg:page) {
                    //console.log((iimg.absolute||iimg.url[0].indexOf('https://')+1||iimg.url[0].indexOf('http://')+1),iimg.absolute,iimg.url[0].indexOf('https://')+1,iimg.url[0].indexOf('http://')+1);
                    if (iimg.url[0] === void 0) return '';
                    if (iimg.absolute || iimg.url[0].indexOf('https://') + 1 || iimg.url[0].indexOf('http://') + 1) {
                        return truth;
                    } else
                        return fals;
                },
                get = -1,
                pageArr = scriptt.pages.map((val: page) => {
                    return val.url[0];
                }),
                settings = {
                    dir: scriptt.config.dir,
                    lines: scriptt.loading.lines,
                    rate: scriptt.loading.rate,
                    diameter: scriptt.loading.diameter,
                    loaderback: scriptt.loading.back,
                    color: scriptt.loading.color,
                    imgprebuffer: scriptt.config.imgprebuffer,
                    imgpostbuffer: scriptt.config.imgpostbuffer,
                    //back: 
                };

                if (typeof (Storage) !== "undefined") {
                    get = parseInt(localStorage.getItem(cG.comicID + "|" + name + "|curPage") as string, 10);
                    /*if(cG.avx[0]>0&&cG.avx[1]>0) */
                    cG.verbose(1, cG.comicID + "|" + name + "|curPage", ":", get);
                    /*else console.log(cG.comicID+"|"+name+"|curPage",":",get);*/
                }

                //prepage, which is from router, overwrites localStorage if over -1, only works on comix
                if (cG.comix === void 0 && cG.prePage >= 0) get = cG.prePage;
                if (get < 0 ) get = scriptt.config.startpage; 

                interface direction {
                    new(): {
                        iimg: string[]
                    }
                }
                var main = new direction(pageArr, anchor, get, settings);
                main.name = name;
                main.type = "def";
                //if(cG.avx[0]>1&&cG.avx[1]>0){}
                main.pg = [anchor]
                main.at = 0;
                main.my = 0;
                main.internals = scriptt;
                main.commitSwap = () => {
                    var tmp = main.internals,
                        internalPages = tmp.pages.map((val: page) => {
                            return val.url[0];
                        }),
                        internalSettings = {
                            dir: tmp.config.dir,
                            lines: tmp.loading.lines,
                            rate: tmp.loading.rate,
                            diameter: tmp.loading.diameter,
                            loaderback: tmp.loading.back,
                            color: tmp.loading.color,
                            imgprebuffer: tmp.config.imgprebuffer,
                            imgpostbuffer: tmp.config.imgpostbuffer
                        };
                    main.hotswap(internalPages, internalSettings);
                }
                main.navto = function (a?:number) {
                    if (a !== null && a !== void 0 && a < main.pg.length) return main.pg[a]._nav();
                    else return main.pg[main.my]._nav();
                }
                main.ch_data = function (a?:number) {
                    var c = main.internals.chapters;
                    var sre = (a === null || void 0 === a) ? main.ch_current() : a;//parseInt(a, 10);
                    return (main.ch_current() == -1) ? {} : (isNaN(sre)) ? c[main.ch_current()] : c[sre];
                }
                main.ch_count = function () {
                    return main.internals.chapters.length;
                }
                main.ch_current = function () {
                    var c = main.internals.chapters,
                        d = main.current();
                    for (var a = 0; a < c.length; a++) {
                        if (c[a].start <= d && d <= c[a].end) return a;
                    }
                    return -1;
                }
                main.ch_go = function (a?:number, b?:number) {
                    var sre = (a === null || void 0 === a) ? 0 : a;//parseInt(a, 10);
                    sre = (isNaN(sre)) ? 0 : sre;
                    var g;
                    if (b === null && b === void 0) g = "start";
                    else g = "end"
                    if (main.ch_current() == -1) return main.go()
                    return main.go(main.internals.chapters[Math.floor(Math.max(0, Math.min(main.internals.chapters.length - 1, sre)))][g]);
                }
                main.ch_prev = function (b?:number) {
                    if (main.ch_current() == -1) return main.go();
                    var g;
                    if (b === null && b === void 0) g = "start";
                    else g = "end"
                    return main.go(main.internals.chapters[Math.max(0, main.ch_current() - 1)][g]);
                }
                main.ch_next = function (b?:number) {
                    if (main.ch_current() == -1) return main.go();
                    var g;
                    if (b === null && b === void 0) g = "start";
                    else g = "end"
                    return main.go(main.internals.chapters[Math.min(main.ch_count() - 1, main.ch_current() + 1)][g]);
                }
                main.ch_frst = function (b?:number) {
                    if (main.ch_current() == -1) return main.go();
                    var g;
                    if (b === null && b === void 0) g = "start";
                    else g = "end"
                    return main.go(main.internals.chapters[0][g]);
                }
                main.ch_last = function (b?:number) {
                    if (main.ch_current() == -1) return main.go();
                    var g;
                    if (b === null && b === void 0) g = "start";
                    else g = "end"
                    return main.go(main.internals.chapters[main.ch_count() - 1][g]);
                }
                var lscurrent = function () {
                    if (typeof (Storage) !== void 0 && cG.fBox.pgesve) {
                        localStorage.setItem(cG.comicID + "|" + name + "|curPage", cG.cPanel[/*"def_"+*/name].current().toString());
                    }
                    if (cG.comix === cG.cPanel[/*"def_"+*/name]) {//if comic is the comix, then push its state
                        var chpmod = (cG.script.config.chapterstartnum) ? 1 : 0,
                            modify = (cG.script.config.pagestartnum) ? 1 : 0,
                            result = cG.cPanel[/*"def_"+*/name].current();
                        switch (cG.script.config.orderby) {
                            case 1:
                                console.log(result);
                                var mechp = cG.cPanel[/*"def_"+*/name].ch_current();
                                result = (mechp + chpmod) + "/" + (result - cG.cPanel[/*"def_"+*/name].internals.chapters[mechp].start + modify)
                                break;
                            case 2:
                                var nT = new Date(cG.cPanel[/*"def_"+*/name].data().release * 1000);
                                var guide = cG.script.config.dateformat.split("/");
                                for (var tim = 0; tim < 3; tim++) {
                                    if (guide[tim].indexOf("Y") + 1) guide[tim] = nT.getFullYear() - 100 + 2000; //TODO: what is this?
                                    else if (guide[tim].indexOf("M") + 1) guide[tim] = nT.getMonth() + 1;
                                    else if (guide[tim].indexOf("D") + 1) guide[tim] = nT.getDate();
                                }
                                result = guide.join("/");
                                //console.log(result,guide,nT);
                                break;
                            default:
                                result += modify;
                        }
                        //if(cG.avx[0]>0&&cG.avx[1]>0) 
                        cG.verbose(1, name, "Pushing state:", result);
                        if (cG.fBox.pgepsh) history.pushState({}, void(0), "#/" + result);
                    }
                    if (cG.queue.stageChange !== void 0)
                        for (var ftn in cG.queue.stageChange) {
                            if (cG.queue.stageChange.hasOwnProperty(ftn)) cG.queue.stageChange[ftn](cG.cPanel[/*"def_"+*/name]);
                        }
                    var strct = cG.cPanel[/*"def_"+*/name].data(cG.cPanel[/*"def_"+*/name].current()).special;
                    var zombie = document.getElementById(name + "_tempScript");//fetch zombie child
                    var preload = cG.HELPERS.stick(cG.cPanel[/*"def_"+*/name].canvi[0], null, null, 0);
                    var display = cG.HELPERS.stick(cG.cPanel[/*"def_"+*/name].canvi[1], null, null, 1);
                    if (zombie !== void 0 && zombie !== null) {
                        anchor.removeChild(zombie);//kill the zombie
                        //if(cG.avx[0]>1&&cG.avx[1]>0){}
                        preload._show();
                        display._show();
                    }
                    if (strct !== null && strct !== void 0 && strct != "") {
                        //anchor.innerHTML += anchor.innerHTML+strct;//this breaks the cavases
                        var spanr = document.createElement("SPAN");
                        spanr.setAttribute("id", name + "_tempScript");
                        spanr.innerHTML = strct;
                        anchor.appendChild(spanr);
                        //if(cG.avx[0]>1&&cG.avx[1]>0){}
                        preload._hide();
                        display._hide();
                    }
                }
                main.callback(1, lscurrent);
                cG.comix = (cG.fBox.protect) ? cG.comix || main : main;
                //if protect is true - set the comix on the first call
                //else always overwrite comix
                return main;
            }
        }
    };
};