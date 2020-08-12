use std::net::{TcpListener, TcpStream};
use std::fs;
use std::fs::File;
use std::io::prelude::*;
mod components;
use components::*;

fn main() {
    let listener = TcpListener::bind("192.168.0.206:12455").unwrap();
    let pool = ThreadPool::new(8);

    for stream in listener.incoming() {
        let stream = stream.unwrap();

        pool.execute(|| {
            handle_connection(stream);
        });
    }
}

fn handle_connection(mut stream: TcpStream) {
    let mut type_buf = [0; 17];
    stream.read(&mut type_buf).unwrap();
    let type_string: String;
    unsafe {type_string = String::from_utf8_unchecked(type_buf.to_vec());}
    let req_vec: Vec<&str> = type_string.split(' ').collect();
    if req_vec[0] == "GET" {
        send_page(req_vec[1], stream);
        println!("{}", req_vec[1]);
    } else if req_vec[0] == "POST"{
        handle_post(stream);
    }
}

fn send_page(path: &str, mut stream: TcpStream) {
    let file: String;
    match path {
        "/" => file = fs::read_to_string("site/html/home.html").unwrap(),
        "/home.css" => file = fs::read_to_string("site/css/home.css").unwrap(),
        "/tutorial" => file = fs::read_to_string("site/html/howto.html").unwrap(),
        "/date.js" => file = fs::read_to_string("site/js/date.js").unwrap(),
        "/contribute" => file = fs::read_to_string("site/html/submit.html").unwrap(),
        _ => file = fs::read_to_string("site/html/no.html").unwrap(),
    }
    stream.write(format!("HTTP/1.1 200 OK\r\nContent-Length: {}\r\n\r\n{}", file.len(), file).as_bytes()).unwrap();
}

fn handle_post(mut stream: TcpStream) {
    let mut buf = [0; 65536];
    let mut full_string = String::new();
    loop {
        let num_bytes = stream.read(&mut buf).unwrap();
        let chunk: String;
        unsafe {chunk = String::from_utf8_unchecked(buf[..num_bytes].to_vec());}
        full_string.push_str(&chunk);
        if num_bytes < 65536 {
            break;
        }
    }
    let _request = File::create("post.txt").unwrap().write(full_string.as_bytes());
}