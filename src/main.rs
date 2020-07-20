use warp::Filter;

#[tokio::main]
async fn main() {
    let home = warp::get().and(warp::path::end()).and(warp::fs::file("site/test.html"));
    //serve to localhost on port 3030
    warp::serve(home).run(([127, 0, 0, 1], 3030)).await;
}
