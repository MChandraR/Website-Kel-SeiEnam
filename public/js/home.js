function addObserver(element, entry , leave, threshold = 1){
    const observer = new IntersectionObserver( (entries)=>{
        entries.forEach((entri)=>{
            console.log(entri);
            if(entri.isIntersecting){
                entry();
            }else{
                leave();
            }
        });
    }, {
        threshold : threshold
    });

    observer.observe(element);
}   

let produk = $("#produk")[0];

addObserver(
    produk, 
    ()=>{ },
    ()=>{ }
);