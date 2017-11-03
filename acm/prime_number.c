#include <stdio.h>
#include <math.h>

int is_prime_number(n){
    int k = sqrt(n);
    while(k>1){
        if(n%k==0)return 0;
        k --;
    }
    return 1;
}

int main(){
    int a;
    int i = 0;
    int b[365];
    while(scanf("%d", &a) != EOF){
        printf("%d\n", a);
        if(is_prime_number(a)==1){
            b[i] = a;
            i ++;
        }
    }
    printf("end input" );
    i = 0;
    while(&b[i]!=NULL && i<365){
        printf("%d\n", b[i]);
        i ++;
    }
    return 0;
}