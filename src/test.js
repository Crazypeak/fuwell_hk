/**
 * Created by Administrator on 2017-05-16.
 */

const full = ({first, last}) => first + ' ' + last;

let name = {
    first: "Yin",
    last: "Mather"
};

function push(array, ...items) {
    items.forEach(function (item) {
        array.push(item);
        console.log(item);
    });
}

let a = [];
push(a, 1, 2, 3);


let values = [1, 5, 11, 9];
let result = values.sort((a, b) => a - b);








