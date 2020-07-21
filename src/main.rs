use warp::Filter;
use warp::fs::file;

#[tokio::main]
async fn main() {
    println!("ntbk-server version 0.1.0");

    //if route doesnt redirect past homepage, get homepage.
    let home = warp::get().and(warp::path::end()).and(file("site/home.html"));
    //html for other pages
    let test = warp::path("test").and(file("site/test.html"));
    //routes to css files for html to access
    let style = warp::path("home.css").and(file("site/css/home.css"));
    //w3.css is a framework that basically lets you cheat at web development
    let w3 = warp::path("w3.css").and(file("site/css/w3.css"));
    //combining all the routes
    let pages = home.or(test);
    let css = style.or(w3);
    let routes = pages.or(css);

    println!("routes initalized, server starting");
    //serve to ip address/port specified (127, 0, 0, 1 for localhost)
    warp::serve(routes).run(([192, 168, 0, 206], 3030)).await;
}
