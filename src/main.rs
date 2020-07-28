use warp::Filter;
use warp::fs::file;
use warp::path;

#[tokio::main]
async fn main() {
    println!("ntbk-server version 0.1.0");

    //if route doesnt redirect past homepage, get homepage.
    let home = warp::get().and(path::end()).and(file("site/home.html"));
    //html for other pages
    let submit = path("contribute").and(file("site/submit.html"));
    let tutorial = path("tutorial").and(file("site/howto.html"));
    //routes to css files for html to access
    let style = path("home.css").and(file("site/css/home.css"));

    let datejs = path("date.js").and(file("site/js/date.js"));
    //combining all the routes
    let pages = home.or(submit).or(tutorial);
    let css = style;
    let routes = pages.or(css).or(datejs);

    println!("routes initalized, server starting");

    //serve to ip address/port specified (127, 0, 0, 1 for localhost, to see over LAN use your local ip)
    warp::serve(routes).run(([127, 0, 0, 1], 3030)).await;
}
