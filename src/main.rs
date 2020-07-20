use warp::Filter;

#[tokio::main]
async fn main() {
    //if route ends with not /somethings, get homepage.
    let home = warp::get().and(warp::path::end()).and(warp::fs::file("site/home.html"));
    //route to css file for html to access
    let css = warp::path("home.css").and(warp::fs::file("site/home.css"));
    //all the routes in one
    let routes = home.or(css);
    //serve to localhost on port 3030
    warp::serve(routes).run(([127, 0, 0, 1], 3030)).await;
}
