use warp::Filter;

#[tokio::main]
async fn main() {
    //if route ends with not /somethings, get homepage.
    let home = warp::get().and(warp::path::end()).and(warp::fs::file("site/home.html"));
    let test = warp::path("test").and(warp::fs::file("site/test.html"));
    //routes to css files for html to access
    let ss = warp::path("home.css").and(warp::fs::file("site/css/home.css"));
    let w3 = warp::path("w3.css").and(warp::fs::file("site/css/w3.css"));
    //combining all the routes
    let pages = home.or(test);
    let css = ss.or(w3);
    let routes = pages.or(css);
    //serve to localhost:3030
    warp::serve(routes).run(([127, 0, 0, 1], 3030)).await;
}
