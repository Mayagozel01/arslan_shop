function addBinary(a: string, b: string): string {
    if (a.length < b.length) {
        [a, b] = [b, a];
    }

    let carry = 0;
    let result = '';
    const n = a.length;
    const m = b.length;

    for (let i = 0; i < n; i++) {
        const digitA = parseInt(a[n - 1 - i]);
        const digitB = i < m ? parseInt(b[m - 1 - i]) : 0;

        const sum = digitA + digitB + carry;

        result = (sum % 2) + result;
        carry = Math.floor(sum / 2);
    }

    if (carry > 0) {
        result = '1' + result;
    }

    return result;
}

console.log(addBinary("1010", "1011"));