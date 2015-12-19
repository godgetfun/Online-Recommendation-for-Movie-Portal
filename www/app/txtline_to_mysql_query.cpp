#include<bits/stdc++.h>
using namespace std;
int main(){
	
	freopen("movielist_final_rotten.txt","r",stdin);
	freopen("mysql_rotten_link.txt","w",stdout);
	string s;
	int i=1;
	while(getline(cin,s)){
		string t;
		t+="insert into rotten values('";
		
		char snum[8];
// convert 123 to string [buf]
		itoa(i, snum, 10);
		t+=snum;
		t+="','";
		t+=s;
		t+="');";
		cout<<t<<"\n";
		i++;
	}
}
