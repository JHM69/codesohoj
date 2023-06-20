#include<bits/stdc++.h>
using namespace std;
int main()
{
    int n, k, i, sum;
    while(~scanf("%d%d",&n, &k))
    {
        sum = k;
        for(i = 0; i <= n; i ++)
        {
            sum += i * 5;
            if(sum > 240)
                break;
        }
        printf("%d\n", i - 1);
    }
    return 0;
}