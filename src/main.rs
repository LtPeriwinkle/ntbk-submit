use std::net::{TcpListener, TcpStream};
use std::fs;
use std::io::prelude::*;
mod components;
use components::*;

fn main() {
    let listener = TcpListener::bind("127.0.0.1:3030").unwrap();
    let pool = ThreadPool::new(8);

    for stream in listener.incoming() {
        let stream = stream.unwrap();

        pool.execute(|| {
            handle_connection(stream);
        });
    }
}

fn handle_connection(mut stream: TcpStream) {
    let mut buffer = [0; 1024];
    stream.read(&mut buffer).unwrap();
    let request = String::from_utf8_lossy(&buffer[..]);
    let req_vec: Vec<&str> = request.split(' ').collect();
    if req_vec[0] == "GET" {
        send_page(req_vec[1], stream);
        println!("foo");
    }
}

fn send_page(path: &str, mut stream: TcpStream) {
    let file: String;
    match path {
        "/" => file = fs::read_to_string("site/home.html").unwrap(),
        _ => file = "this should not happen".to_string(),
    }
    stream.write(format!("HTTP/1.1 200 OK\r\nContent-Length: {}\r\n\r\n{}", file.len(), file).as_bytes()).unwrap();
}
