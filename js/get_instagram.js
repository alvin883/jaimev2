/**
 * Get and display Instagram Feed
 */
function get_instagram(username = 'just_anonym883'){
    var Instagram_DEBUG_HTML = '', Instagram = {};

    // Fecthing the Instagram data
    function Instagram_Fecth(instagramID){
        return fetch('https://www.instagram.com/' + instagramID + '/')
            .then(res => res.text())
            .then(txt => {
                Instagram_DEBUG_HTML = txt;
                const doc = Instagram_ParseExplorePage(txt),
                    sharedData = Instagram_ExtractSharedData(doc);
                return sharedData;
            })
            .catch(e => {
                console.log('Was unable to reach Instagram');
                console.debug(e);
            })
    }

    // Parse data
    function Instagram_ParseExplorePage(txt){
        const dp = new DOMParser(),
            doc = dp.parseFromString(txt, "text/html");
        return doc;
    }

    function Instagram_ExtractSharedData(doc){
        const scs = Array.from(doc.querySelectorAll('script')),
            sharedDataRawText = scs.filter(sc => 
                sc.textContent.indexOf('_sharedData') > -1
            )[0];

        if(sharedDataRawText) {
            const sharedDataJSONText = sharedDataRawText.textContent.trim().match(/\=\ (.*);/)[1];
            let sharedData;
            try {
                sharedData = JSON.parse(sharedDataJSONText);
            } catch (e){
                console.log('Failed to parse Instagram data. See `window.__FAIL_TXT`');
                window.__FAIL_TXT = sharedDataJSONText;
            }
            return sharedData;
        }
    }

    
    function customToFixed(val){
        if( val > 1000 ){
            val = (val / 1000) - parseInt( val / 1000 ) > 0 ?
                parseFloat(val / 1000).toFixed(1) :
                parseInt(val / 1000);
            val += "k";
        }
        return val;
    }

    if( !$('#instagram_slider').length ) return false;
    Instagram_Fecth(username)
        .then(sharedData => {
            // Get user data
            var data = sharedData.entry_data.ProfilePage[0].graphql.user;

            // Render per data
            Instagram.DOM = data.edge_owner_to_timeline_media.edges.reduce((acc,val) => {
                return acc + 
                    `<div class="item" data-url="https://www.instagram.com/p/`+ val.node.shortcode + `" onclick="gotoURL(this)">
                        <img src="` + val.node.thumbnail_src + `"/>
                        <div class="detail">
                            <span><i class="fas fa-heart"></i></span><span>` + customToFixed(val.node.edge_liked_by.count) + `</span>
                            <span class="divider"></span>
                            <span><i class="fas fa-comment"></i></span><span>` + customToFixed(val.node.edge_media_to_comment.count) + `</span>
                        </div>
                    </div>`;
            }, ``);
            
            // Variable
            Instagram.followers = customToFixed(data.edge_followed_by.count);
            Instagram.posts = customToFixed(data.edge_owner_to_timeline_media.count);

            // Insert to DOM
            document.getElementById('instagram_slider').getElementsByClassName('content')[0].innerHTML = Instagram.DOM;
            document.getElementById('instagram_posts').innerHTML = Instagram.posts;
            document.getElementById('instagram_followers').innerHTML = Instagram.followers;

            
            return true;
        }).then(()=>{
            $('.instagram-slider').slick({
                arrows: true,
                dots: false,
                autoplay: true,
                slidesToShow: 1,
                variableWidth: true,
                autoplaySpeed: 7000,
                swipeToSlide: true
            });
        });
}